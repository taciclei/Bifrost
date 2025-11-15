# Esquema de Banco de Dados PostgreSQL
## Plataforma de Eletropostos com Sylius

**Versão:** 1.0
**Data:** Janeiro 2025
**SGBD:** PostgreSQL 15+
**ORM:** Doctrine ORM 3.x

---

## 1. VISÃO GERAL

### 1.1 Estrutura de Schemas

```sql
-- Schemas principais
CREATE SCHEMA IF NOT EXISTS sylius;        -- Tabelas core do Sylius
CREATE SCHEMA IF NOT EXISTS charging;      -- Tabelas customizadas de recarga
CREATE SCHEMA IF NOT EXISTS analytics;     -- Tabelas de métricas
CREATE SCHEMA IF NOT EXISTS audit;         -- Logs de auditoria
```

### 1.2 Extensões PostgreSQL

```sql
-- UUID para IDs únicos
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- Funções de texto (busca)
CREATE EXTENSION IF NOT EXISTS "pg_trgm";

-- Funções criptográficas
CREATE EXTENSION IF NOT EXISTS "pgcrypto";

-- TimescaleDB para séries temporais (opcional)
-- CREATE EXTENSION IF NOT EXISTS "timescaledb";
```

---

## 2. TABELAS SYLIUS (Core)

As tabelas do Sylius já existem por padrão. Principais tabelas que usaremos:

### 2.1 sylius_customer
```sql
-- Clientes (Proprietários de VE)
-- Gerenciada pelo Sylius CustomerBundle
-- Localização: vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Doctrine/ORM

TABLE sylius_customer (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    phone_number VARCHAR(50),
    gender VARCHAR(1),          -- m, f, u
    birthday DATE,
    email_canonical VARCHAR(255) UNIQUE,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP
);

CREATE INDEX idx_customer_email ON sylius_customer(email);
CREATE INDEX idx_customer_created ON sylius_customer(created_at);
```

### 2.2 sylius_order
```sql
-- Pedidos (Usado para sessões de recarga)
-- Gerenciada pelo Sylius OrderBundle

TABLE sylius_order (
    id SERIAL PRIMARY KEY,
    customer_id INTEGER REFERENCES sylius_customer(id),
    number VARCHAR(255) UNIQUE,     -- Order number único
    state VARCHAR(255) NOT NULL,    -- cart, new, fulfilled, cancelled
    checkout_completed_at TIMESTAMP,
    items_total INTEGER NOT NULL,   -- Em centavos
    total INTEGER NOT NULL,
    currency_code VARCHAR(3) DEFAULT 'BRL',
    locale_code VARCHAR(255),
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP
);

CREATE INDEX idx_order_customer ON sylius_order(customer_id);
CREATE INDEX idx_order_state ON sylius_order(state);
CREATE INDEX idx_order_number ON sylius_order(number);
CREATE INDEX idx_order_completed ON sylius_order(checkout_completed_at);
```

### 2.3 sylius_payment
```sql
-- Pagamentos
-- Gerenciada pelo Sylius PaymentBundle

TABLE sylius_payment (
    id SERIAL PRIMARY KEY,
    order_id INTEGER REFERENCES sylius_order(id),
    method_id INTEGER REFERENCES sylius_payment_method(id),
    amount INTEGER NOT NULL,        -- Em centavos
    state VARCHAR(255) NOT NULL,    -- new, processing, completed, failed
    currency_code VARCHAR(3) DEFAULT 'BRL',
    details JSONB,                  -- Detalhes do pagamento
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP
);

CREATE INDEX idx_payment_order ON sylius_payment(order_id);
CREATE INDEX idx_payment_state ON sylius_payment(state);
CREATE INDEX idx_payment_method ON sylius_payment(method_id);
```

### 2.4 sylius_payment_method
```sql
-- Métodos de pagamento (Stripe, Pix, etc)
TABLE sylius_payment_method (
    id SERIAL PRIMARY KEY,
    code VARCHAR(255) UNIQUE NOT NULL,
    gateway_config_id INTEGER,
    enabled BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP
);
```

---

## 3. TABELAS CUSTOMIZADAS - CHARGING SCHEMA

### 3.1 charging.vehicle
```sql
-- Veículos dos clientes
CREATE TABLE charging.vehicle (
    id SERIAL PRIMARY KEY,
    owner_id INTEGER NOT NULL REFERENCES sylius_customer(id) ON DELETE CASCADE,
    make VARCHAR(50) NOT NULL,              -- Tesla, BYD, Nissan, etc
    model VARCHAR(50) NOT NULL,             -- Model 3, Dolphin, Leaf
    year INTEGER NOT NULL,
    license_plate VARCHAR(20) UNIQUE NOT NULL,
    battery_capacity_kwh INTEGER NOT NULL,  -- 60, 75, 100 kWh
    connector_type VARCHAR(20) NOT NULL,    -- Type 2, CCS, CHAdeMO
    color VARCHAR(50),
    vin VARCHAR(17) UNIQUE,                 -- Vehicle Identification Number
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_year CHECK (year >= 2000 AND year <= 2100),
    CONSTRAINT chk_battery CHECK (battery_capacity_kwh > 0)
);

CREATE INDEX idx_vehicle_owner ON charging.vehicle(owner_id);
CREATE INDEX idx_vehicle_plate ON charging.vehicle(license_plate);
CREATE INDEX idx_vehicle_active ON charging.vehicle(is_active);
```

### 3.2 charging.station
```sql
-- Estações de recarga (localizações físicas)
CREATE TABLE charging.station (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,             -- "Shopping Bosque Grão-Pará"
    slug VARCHAR(100) UNIQUE NOT NULL,      -- "shopping-bosque-grao-para"

    -- Localização
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL DEFAULT 'Belém',
    state VARCHAR(2) NOT NULL DEFAULT 'PA',
    postal_code VARCHAR(10),
    latitude DECIMAL(10, 7) NOT NULL,       -- -1.4558
    longitude DECIMAL(10, 7) NOT NULL,      -- -48.4902

    -- Parceria
    partner_name VARCHAR(100),              -- Nome do estabelecimento
    partner_revenue_share DECIMAL(5, 2),    -- % de receita (ex: 30.00)
    contract_start_date DATE,
    contract_end_date DATE,

    -- Informações
    description TEXT,
    amenities JSONB,                        -- {"wifi": true, "cafe": true}
    operating_hours JSONB,                  -- {"monday": "00:00-23:59"}

    -- Status
    is_active BOOLEAN DEFAULT TRUE,
    is_visible BOOLEAN DEFAULT TRUE,        -- Visível no app

    -- Timestamps
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_lat CHECK (latitude BETWEEN -90 AND 90),
    CONSTRAINT chk_lng CHECK (longitude BETWEEN -180 AND 180),
    CONSTRAINT chk_revenue_share CHECK (partner_revenue_share >= 0 AND partner_revenue_share <= 100)
);

CREATE INDEX idx_station_slug ON charging.station(slug);
CREATE INDEX idx_station_active ON charging.station(is_active);
CREATE INDEX idx_station_location ON charging.station USING gist (
    ll_to_earth(latitude::float8, longitude::float8)
); -- Requer cube + earthdistance extensions

-- Índice para busca geoespacial simples
CREATE INDEX idx_station_lat_lng ON charging.station(latitude, longitude);
```

### 3.3 charging.charger
```sql
-- Carregadores individuais
CREATE TABLE charging.charger (
    id SERIAL PRIMARY KEY,
    station_id INTEGER NOT NULL REFERENCES charging.station(id) ON DELETE CASCADE,

    -- Identificação
    serial_number VARCHAR(50) UNIQUE NOT NULL,  -- TG-DC30-001
    name VARCHAR(100),                          -- "Carregador 1"

    -- Especificações técnicas
    model VARCHAR(50) NOT NULL,                 -- "DC-30kW"
    manufacturer VARCHAR(50),                   -- "TGOOD", "BYD"
    power_kw INTEGER NOT NULL,                  -- 30, 60, 150
    charger_type VARCHAR(10) NOT NULL,          -- AC, DC
    connector_type VARCHAR(20) NOT NULL,        -- Type 2, CCS, CHAdeMO

    -- OCPP
    ocpp_identity VARCHAR(100) UNIQUE,          -- ID usado no OCPP
    firmware_version VARCHAR(20),
    last_heartbeat TIMESTAMP,

    -- Status
    status VARCHAR(20) NOT NULL DEFAULT 'Offline',  -- Available, Occupied, Offline, Faulted, Reserved
    error_code VARCHAR(50),

    -- Configuração
    max_current_amps INTEGER,
    voltage_volts INTEGER,
    phases INTEGER DEFAULT 3,                   -- 1 ou 3

    -- Operação
    is_active BOOLEAN DEFAULT TRUE,
    maintenance_mode BOOLEAN DEFAULT FALSE,

    -- Timestamps
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_charger_type CHECK (charger_type IN ('AC', 'DC')),
    CONSTRAINT chk_power CHECK (power_kw > 0),
    CONSTRAINT chk_status CHECK (status IN ('Available', 'Occupied', 'Offline', 'Faulted', 'Reserved'))
);

CREATE INDEX idx_charger_station ON charging.charger(station_id);
CREATE INDEX idx_charger_serial ON charging.charger(serial_number);
CREATE INDEX idx_charger_status ON charging.charger(status);
CREATE INDEX idx_charger_active ON charging.charger(is_active);
CREATE INDEX idx_charger_ocpp ON charging.charger(ocpp_identity);
CREATE INDEX idx_charger_heartbeat ON charging.charger(last_heartbeat);
```

### 3.4 charging.charging_session
```sql
-- Sessões de recarga (transações)
CREATE TABLE charging.charging_session (
    id SERIAL PRIMARY KEY,

    -- Relacionamentos
    customer_id INTEGER NOT NULL REFERENCES sylius_customer(id),
    charger_id INTEGER NOT NULL REFERENCES charging.charger(id),
    vehicle_id INTEGER REFERENCES charging.vehicle(id),
    order_id INTEGER UNIQUE REFERENCES sylius_order(id),  -- Link para Sylius Order

    -- OCPP
    ocpp_transaction_id INTEGER UNIQUE,         -- ID da transação OCPP
    id_tag VARCHAR(100),                        -- RFID ou identificador

    -- Tempos
    start_time TIMESTAMP NOT NULL DEFAULT NOW(),
    end_time TIMESTAMP,
    duration_seconds INTEGER,

    -- Energia
    meter_start_kwh DECIMAL(10, 2) NOT NULL DEFAULT 0,
    meter_end_kwh DECIMAL(10, 2),
    energy_consumed_kwh DECIMAL(10, 2),

    -- Custos
    tariff_rate_kwh DECIMAL(10, 2),            -- Tarifa aplicada (R$/kWh)
    cost_amount INTEGER,                        -- Total em centavos
    tax_amount INTEGER DEFAULT 0,
    discount_amount INTEGER DEFAULT 0,
    final_amount INTEGER,

    -- Status
    status VARCHAR(20) NOT NULL DEFAULT 'Active',  -- Active, Completed, Failed, Cancelled
    stop_reason VARCHAR(50),                    -- Local, Remote, EmergencyStop, EVDisconnected

    -- Metadados
    metadata JSONB,                             -- Informações adicionais

    -- Timestamps
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_session_status CHECK (status IN ('Active', 'Completed', 'Failed', 'Cancelled')),
    CONSTRAINT chk_energy CHECK (
        (energy_consumed_kwh IS NULL) OR
        (energy_consumed_kwh >= 0 AND energy_consumed_kwh <= 1000)
    )
);

CREATE INDEX idx_session_customer ON charging.charging_session(customer_id);
CREATE INDEX idx_session_charger ON charging.charging_session(charger_id);
CREATE INDEX idx_session_vehicle ON charging.charging_session(vehicle_id);
CREATE INDEX idx_session_order ON charging.charging_session(order_id);
CREATE INDEX idx_session_status ON charging.charging_session(status);
CREATE INDEX idx_session_start ON charging.charging_session(start_time);
CREATE INDEX idx_session_end ON charging.charging_session(end_time);
CREATE INDEX idx_session_ocpp_tx ON charging.charging_session(ocpp_transaction_id);

-- Índice para busca de sessões ativas
CREATE INDEX idx_session_active ON charging.charging_session(customer_id, status)
    WHERE status = 'Active';
```

### 3.5 charging.meter_value
```sql
-- Valores de medição em tempo real (MeterValues OCPP)
CREATE TABLE charging.meter_value (
    id BIGSERIAL PRIMARY KEY,
    session_id INTEGER NOT NULL REFERENCES charging.charging_session(id) ON DELETE CASCADE,

    -- Timestamp da leitura
    timestamp TIMESTAMP NOT NULL DEFAULT NOW(),

    -- Valores medidos
    energy_wh DECIMAL(10, 2),                   -- Energia total (Wh)
    power_w DECIMAL(10, 2),                     -- Potência instantânea (W)
    current_amps DECIMAL(10, 2),                -- Corrente (A)
    voltage_volts DECIMAL(10, 2),               -- Tensão (V)
    temperature_celsius DECIMAL(5, 2),          -- Temperatura
    soc_percent INTEGER,                        -- State of Charge (%)

    -- Metadados OCPP
    measurand VARCHAR(50),                      -- Energy.Active.Import.Register, Power.Active.Import
    phase VARCHAR(10),                          -- L1, L2, L3
    unit VARCHAR(20),                           -- Wh, W, A, V, Celsius, Percent
    context VARCHAR(20),                        -- Sample.Periodic, Sample.Clock

    created_at TIMESTAMP DEFAULT NOW()
);

CREATE INDEX idx_meter_session ON charging.meter_value(session_id);
CREATE INDEX idx_meter_timestamp ON charging.meter_value(timestamp);
CREATE INDEX idx_meter_session_time ON charging.meter_value(session_id, timestamp DESC);

-- Converter para TimescaleDB hypertable (opcional, melhor performance)
-- SELECT create_hypertable('charging.meter_value', 'timestamp');
```

### 3.6 charging.tariff
```sql
-- Tarifas de recarga
CREATE TABLE charging.tariff (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    code VARCHAR(50) UNIQUE NOT NULL,           -- "base", "peak", "valley"

    -- Tarifação
    rate_per_kwh DECIMAL(10, 2) NOT NULL,       -- R$/kWh
    time_of_day_start TIME,                     -- 07:00:00
    time_of_day_end TIME,                       -- 09:00:00
    days_of_week INTEGER[],                     -- {1,2,3,4,5} = seg-sex

    -- Condições
    charger_type VARCHAR(10),                   -- AC, DC (null = all)
    power_kw_min INTEGER,
    power_kw_max INTEGER,

    -- Prioridade (maior = mais prioritário)
    priority INTEGER DEFAULT 0,

    -- Status
    is_active BOOLEAN DEFAULT TRUE,
    valid_from DATE,
    valid_until DATE,

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_tariff_rate CHECK (rate_per_kwh > 0)
);

CREATE INDEX idx_tariff_code ON charging.tariff(code);
CREATE INDEX idx_tariff_active ON charging.tariff(is_active);
CREATE INDEX idx_tariff_priority ON charging.tariff(priority DESC);
```

### 3.7 charging.ocpp_message_log
```sql
-- Log de mensagens OCPP (debugging e auditoria)
CREATE TABLE charging.ocpp_message_log (
    id BIGSERIAL PRIMARY KEY,

    -- Identificação
    charger_id INTEGER REFERENCES charging.charger(id) ON DELETE SET NULL,
    session_id INTEGER REFERENCES charging.charging_session(id) ON DELETE SET NULL,

    -- Mensagem OCPP
    direction VARCHAR(10) NOT NULL,             -- incoming, outgoing
    message_type INTEGER NOT NULL,              -- 2=CALL, 3=CALLRESULT, 4=CALLERROR
    unique_id VARCHAR(36) NOT NULL,             -- UUID da mensagem
    action VARCHAR(50),                         -- BootNotification, StartTransaction
    payload JSONB NOT NULL,                     -- Payload completo

    -- Resposta (se aplicável)
    response_payload JSONB,
    response_time_ms INTEGER,

    -- Erro (se aplicável)
    error_code VARCHAR(50),
    error_description TEXT,

    -- Timestamp
    created_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_direction CHECK (direction IN ('incoming', 'outgoing')),
    CONSTRAINT chk_message_type CHECK (message_type IN (2, 3, 4))
);

CREATE INDEX idx_ocpp_log_charger ON charging.ocpp_message_log(charger_id);
CREATE INDEX idx_ocpp_log_session ON charging.ocpp_message_log(session_id);
CREATE INDEX idx_ocpp_log_action ON charging.ocpp_message_log(action);
CREATE INDEX idx_ocpp_log_created ON charging.ocpp_message_log(created_at DESC);
CREATE INDEX idx_ocpp_log_unique ON charging.ocpp_message_log(unique_id);

-- Particionamento por data (opcional, para grandes volumes)
-- CREATE TABLE charging.ocpp_message_log_2025_01
--     PARTITION OF charging.ocpp_message_log
--     FOR VALUES FROM ('2025-01-01') TO ('2025-02-01');
```

---

## 4. TABELAS DE ANALYTICS

### 4.1 analytics.daily_stats
```sql
-- Estatísticas diárias agregadas
CREATE TABLE analytics.daily_stats (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    station_id INTEGER REFERENCES charging.station(id),
    charger_id INTEGER REFERENCES charging.charger(id),

    -- Métricas de uso
    total_sessions INTEGER DEFAULT 0,
    total_energy_kwh DECIMAL(10, 2) DEFAULT 0,
    total_duration_hours DECIMAL(10, 2) DEFAULT 0,
    avg_session_duration_minutes INTEGER,

    -- Métricas financeiras (centavos)
    total_revenue INTEGER DEFAULT 0,
    avg_revenue_per_session INTEGER,

    -- Utilização
    utilization_rate DECIMAL(5, 2),             -- % do tempo ocupado
    uptime_minutes INTEGER,
    downtime_minutes INTEGER,

    -- Clientes únicos
    unique_customers INTEGER DEFAULT 0,

    created_at TIMESTAMP DEFAULT NOW(),

    UNIQUE(date, station_id, charger_id)
);

CREATE INDEX idx_daily_stats_date ON analytics.daily_stats(date DESC);
CREATE INDEX idx_daily_stats_station ON analytics.daily_stats(station_id, date DESC);
CREATE INDEX idx_daily_stats_charger ON analytics.daily_stats(charger_id, date DESC);
```

### 4.2 analytics.revenue_report
```sql
-- Relatórios de receita (para parceiros)
CREATE TABLE analytics.revenue_report (
    id SERIAL PRIMARY KEY,

    -- Período
    period_start DATE NOT NULL,
    period_end DATE NOT NULL,

    -- Entidade
    station_id INTEGER NOT NULL REFERENCES charging.station(id),

    -- Receita (centavos)
    gross_revenue INTEGER DEFAULT 0,
    partner_share INTEGER DEFAULT 0,               -- Receita do parceiro
    company_share INTEGER DEFAULT 0,               -- Receita da empresa

    -- Breakdown
    energy_revenue INTEGER DEFAULT 0,
    service_fees INTEGER DEFAULT 0,
    taxes INTEGER DEFAULT 0,

    -- Sessões
    total_sessions INTEGER DEFAULT 0,
    total_energy_kwh DECIMAL(10, 2) DEFAULT 0,

    -- Status
    status VARCHAR(20) DEFAULT 'draft',            -- draft, finalized, paid
    paid_at TIMESTAMP,

    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),

    CONSTRAINT chk_revenue_status CHECK (status IN ('draft', 'finalized', 'paid'))
);

CREATE INDEX idx_revenue_report_station ON analytics.revenue_report(station_id);
CREATE INDEX idx_revenue_report_period ON analytics.revenue_report(period_start, period_end);
CREATE INDEX idx_revenue_report_status ON analytics.revenue_report(status);
```

---

## 5. TABELAS DE AUDITORIA

### 5.1 audit.user_activity_log
```sql
-- Log de atividades de usuários
CREATE TABLE audit.user_activity_log (
    id BIGSERIAL PRIMARY KEY,
    customer_id INTEGER REFERENCES sylius_customer(id) ON DELETE SET NULL,

    -- Atividade
    action VARCHAR(50) NOT NULL,                -- login, start_charging, stop_charging
    entity_type VARCHAR(50),                    -- ChargingSession, Order
    entity_id INTEGER,

    -- Contexto
    ip_address INET,
    user_agent TEXT,

    -- Dados
    old_values JSONB,
    new_values JSONB,

    created_at TIMESTAMP DEFAULT NOW()
);

CREATE INDEX idx_activity_customer ON audit.user_activity_log(customer_id);
CREATE INDEX idx_activity_action ON audit.user_activity_log(action);
CREATE INDEX idx_activity_created ON audit.user_activity_log(created_at DESC);
CREATE INDEX idx_activity_entity ON audit.user_activity_log(entity_type, entity_id);
```

---

## 6. VIEWS ÚTEIS

### 6.1 vw_active_sessions
```sql
-- Sessões ativas com detalhes completos
CREATE OR REPLACE VIEW charging.vw_active_sessions AS
SELECT
    cs.id,
    cs.customer_id,
    c.first_name || ' ' || c.last_name AS customer_name,
    cs.charger_id,
    ch.name AS charger_name,
    ch.serial_number,
    s.name AS station_name,
    s.address AS station_address,
    cs.start_time,
    EXTRACT(EPOCH FROM (NOW() - cs.start_time))::INTEGER AS duration_seconds,
    cs.meter_start_kwh,
    cs.energy_consumed_kwh,
    cs.tariff_rate_kwh,
    (cs.energy_consumed_kwh * cs.tariff_rate_kwh * 100)::INTEGER AS estimated_cost_cents,
    cs.status
FROM charging.charging_session cs
JOIN sylius_customer c ON cs.customer_id = c.id
JOIN charging.charger ch ON cs.charger_id = ch.id
JOIN charging.station s ON ch.station_id = s.id
WHERE cs.status = 'Active';
```

### 6.2 vw_charger_availability
```sql
-- Disponibilidade de carregadores por estação
CREATE OR REPLACE VIEW charging.vw_charger_availability AS
SELECT
    s.id AS station_id,
    s.name AS station_name,
    s.latitude,
    s.longitude,
    COUNT(ch.id) AS total_chargers,
    COUNT(ch.id) FILTER (WHERE ch.status = 'Available') AS available_chargers,
    COUNT(ch.id) FILTER (WHERE ch.status = 'Occupied') AS occupied_chargers,
    COUNT(ch.id) FILTER (WHERE ch.status = 'Offline') AS offline_chargers,
    COUNT(ch.id) FILTER (WHERE ch.charger_type = 'DC') AS dc_chargers,
    COUNT(ch.id) FILTER (WHERE ch.charger_type = 'AC') AS ac_chargers,
    MAX(ch.power_kw) AS max_power_kw,
    s.is_active
FROM charging.station s
LEFT JOIN charging.charger ch ON s.id = ch.station_id AND ch.is_active = TRUE
WHERE s.is_active = TRUE
GROUP BY s.id;
```

### 6.3 vw_customer_charging_history
```sql
-- Histórico de recargas por cliente
CREATE OR REPLACE VIEW charging.vw_customer_charging_history AS
SELECT
    cs.id AS session_id,
    cs.customer_id,
    c.email,
    s.name AS station_name,
    ch.name AS charger_name,
    cs.start_time,
    cs.end_time,
    cs.duration_seconds,
    cs.energy_consumed_kwh,
    cs.cost_amount / 100.0 AS cost_brl,
    cs.status,
    o.number AS order_number,
    p.state AS payment_state
FROM charging.charging_session cs
JOIN sylius_customer c ON cs.customer_id = c.id
JOIN charging.charger ch ON cs.charger_id = ch.id
JOIN charging.station s ON ch.station_id = s.id
LEFT JOIN sylius_order o ON cs.order_id = o.id
LEFT JOIN sylius_payment p ON o.id = p.order_id;
```

---

## 7. FUNÇÕES E TRIGGERS

### 7.1 Calcular duração e energia consumida
```sql
-- Trigger para atualizar automaticamente duração e energia ao finalizar sessão
CREATE OR REPLACE FUNCTION charging.update_session_on_completion()
RETURNS TRIGGER AS $$
BEGIN
    IF NEW.end_time IS NOT NULL AND OLD.end_time IS NULL THEN
        -- Calcular duração
        NEW.duration_seconds := EXTRACT(EPOCH FROM (NEW.end_time - NEW.start_time))::INTEGER;

        -- Calcular energia consumida
        IF NEW.meter_end_kwh IS NOT NULL AND NEW.meter_start_kwh IS NOT NULL THEN
            NEW.energy_consumed_kwh := NEW.meter_end_kwh - NEW.meter_start_kwh;
        END IF;

        -- Calcular custo (se tarifa definida)
        IF NEW.tariff_rate_kwh IS NOT NULL AND NEW.energy_consumed_kwh IS NOT NULL THEN
            NEW.cost_amount := (NEW.energy_consumed_kwh * NEW.tariff_rate_kwh * 100)::INTEGER;
            NEW.final_amount := NEW.cost_amount - COALESCE(NEW.discount_amount, 0) + COALESCE(NEW.tax_amount, 0);
        END IF;
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_update_session_completion
    BEFORE UPDATE ON charging.charging_session
    FOR EACH ROW
    EXECUTE FUNCTION charging.update_session_on_completion();
```

### 7.2 Atualizar status do carregador
```sql
-- Trigger para atualizar status do carregador quando sessão inicia/termina
CREATE OR REPLACE FUNCTION charging.update_charger_status()
RETURNS TRIGGER AS $$
BEGIN
    IF TG_OP = 'INSERT' THEN
        -- Nova sessão iniciada
        UPDATE charging.charger
        SET status = 'Occupied', updated_at = NOW()
        WHERE id = NEW.charger_id;

    ELSIF TG_OP = 'UPDATE' THEN
        -- Sessão finalizada
        IF NEW.status IN ('Completed', 'Failed', 'Cancelled') AND OLD.status = 'Active' THEN
            UPDATE charging.charger
            SET status = 'Available', updated_at = NOW()
            WHERE id = NEW.charger_id;
        END IF;
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trg_update_charger_on_session_change
    AFTER INSERT OR UPDATE ON charging.charging_session
    FOR EACH ROW
    EXECUTE FUNCTION charging.update_charger_status();
```

### 7.3 Calcular utilização diária
```sql
-- Função para calcular estatísticas diárias
CREATE OR REPLACE FUNCTION analytics.calculate_daily_stats(
    p_date DATE,
    p_charger_id INTEGER DEFAULT NULL
)
RETURNS VOID AS $$
BEGIN
    INSERT INTO analytics.daily_stats (
        date,
        station_id,
        charger_id,
        total_sessions,
        total_energy_kwh,
        total_duration_hours,
        avg_session_duration_minutes,
        total_revenue,
        avg_revenue_per_session,
        unique_customers
    )
    SELECT
        p_date,
        ch.station_id,
        cs.charger_id,
        COUNT(cs.id),
        SUM(cs.energy_consumed_kwh),
        SUM(cs.duration_seconds) / 3600.0,
        AVG(cs.duration_seconds / 60),
        SUM(cs.final_amount),
        AVG(cs.final_amount),
        COUNT(DISTINCT cs.customer_id)
    FROM charging.charging_session cs
    JOIN charging.charger ch ON cs.charger_id = ch.id
    WHERE cs.start_time::DATE = p_date
        AND (p_charger_id IS NULL OR cs.charger_id = p_charger_id)
        AND cs.status = 'Completed'
    GROUP BY ch.station_id, cs.charger_id
    ON CONFLICT (date, station_id, charger_id)
    DO UPDATE SET
        total_sessions = EXCLUDED.total_sessions,
        total_energy_kwh = EXCLUDED.total_energy_kwh,
        total_duration_hours = EXCLUDED.total_duration_hours,
        avg_session_duration_minutes = EXCLUDED.avg_session_duration_minutes,
        total_revenue = EXCLUDED.total_revenue,
        avg_revenue_per_session = EXCLUDED.avg_revenue_per_session,
        unique_customers = EXCLUDED.unique_customers;
END;
$$ LANGUAGE plpgsql;

-- Agendar cálculo diário via pg_cron (ou via cron/scheduler externo)
-- SELECT cron.schedule('calculate-daily-stats', '0 1 * * *',
--    'SELECT analytics.calculate_daily_stats(CURRENT_DATE - 1)');
```

---

## 8. DADOS INICIAIS (SEEDS)

### 8.1 Estações de exemplo
```sql
-- Inserir estações iniciais
INSERT INTO charging.station (name, slug, address, city, state, latitude, longitude, is_active) VALUES
('Shopping Bosque Grão-Pará', 'shopping-bosque', 'Av. Centenário, 1052 - Val-de-Cans', 'Belém', 'PA', -1.4170, -48.4425, TRUE),
('Shopping Pátio Belém', 'shopping-patio', 'Travessa Padre Eutíquio, 840 - Batista Campos', 'Belém', 'PA', -1.4436, -48.4823, TRUE),
('Aeroporto Val-de-Cans', 'aeroporto-belem', 'Av. Júlio César - Val-de-Cans', 'Belém', 'PA', -1.3793, -48.4762, TRUE);

-- Inserir carregadores de exemplo
INSERT INTO charging.charger (station_id, serial_number, name, model, manufacturer, power_kw, charger_type, connector_type, ocpp_identity, status) VALUES
(1, 'TG-DC30-001', 'Carregador Rápido 1', 'DC-30kW', 'TGOOD', 30, 'DC', 'CCS', 'TG-DC30-001', 'Available'),
(1, 'AC22-001', 'Carregador AC 1', 'AC-22kW', 'ABB', 22, 'AC', 'Type 2', 'AC22-001', 'Available'),
(2, 'BYD-DC60-001', 'Carregador Ultra-Rápido', 'DC-60kW', 'BYD', 60, 'DC', 'CCS', 'BYD-DC60-001', 'Available');
```

### 8.2 Tarifas iniciais
```sql
-- Tarifas de exemplo
INSERT INTO charging.tariff (name, code, rate_per_kwh, time_of_day_start, time_of_day_end, charger_type, is_active, priority) VALUES
('Tarifa Base', 'base', 1.00, NULL, NULL, NULL, TRUE, 0),
('Tarifa Pico', 'peak', 1.20, '07:00:00', '09:00:00', NULL, TRUE, 10),
('Tarifa Pico Noite', 'peak_night', 1.20, '18:00:00', '21:00:00', NULL, TRUE, 10),
('Tarifa Vale', 'valley', 0.85, '22:00:00', '06:00:00', NULL, TRUE, 5),
('Tarifa DC Premium', 'dc_premium', 1.30, NULL, NULL, 'DC', TRUE, 15);
```

---

## 9. BACKUP E MANUTENÇÃO

### 9.1 Script de Backup
```bash
#!/bin/bash
# backup.sh

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/postgresql"
DB_NAME="eletropostos"

# Backup completo
pg_dump -U postgres -F c -b -v -f "${BACKUP_DIR}/full_${DATE}.backup" ${DB_NAME}

# Backup apenas schema
pg_dump -U postgres --schema-only -f "${BACKUP_DIR}/schema_${DATE}.sql" ${DB_NAME}

# Limpar backups antigos (>30 dias)
find ${BACKUP_DIR} -name "*.backup" -mtime +30 -delete
```

### 9.2 Índices de Manutenção
```sql
-- Reindexar todas as tabelas (executar periodicamente)
REINDEX DATABASE eletropostos;

-- Analisar estatísticas para otimizador
ANALYZE;

-- Vacuum para recuperar espaço
VACUUM ANALYZE;

-- Ver tamanho das tabelas
SELECT
    schemaname,
    tablename,
    pg_size_pretty(pg_total_relation_size(schemaname||'.'||tablename)) AS size
FROM pg_tables
WHERE schemaname IN ('charging', 'analytics', 'audit')
ORDER BY pg_total_relation_size(schemaname||'.'||tablename) DESC
LIMIT 20;
```

---

**Esquema de Banco de Dados - Versão 1.0**
**Última atualização:** Janeiro 2025
**Aprovação:** Arquiteto de Dados + DBA
