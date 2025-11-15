# 📋 Especificações Técnicas - Sistema Eletroposto

**Versão:** 1.0
**Data:** Janeiro 2025
**Status:** Draft

---

## 📑 Índice

1. [Visão Geral](#visão-geral)
2. [Requisitos Funcionais](#requisitos-funcionais)
3. [Requisitos Não-Funcionais](#requisitos-não-funcionais)
4. [Arquitetura do Sistema](#arquitetura-do-sistema)
5. [Modelo de Dados](#modelo-de-dados)
6. [API RESTful](#api-restful)
7. [Protocolo OCPP 1.6](#protocolo-ocpp-16)
8. [Autenticação e Segurança](#autenticação-e-segurança)
9. [Integrações](#integrações)
10. [Performance e Escalabilidade](#performance-e-escalabilidade)

---

## 🎯 Visão Geral

### Objetivo
Desenvolver um sistema completo de gestão de eletropostos (estações de carregamento de veículos elétricos) integrado com protocolo OCPP 1.6, plataforma de e-commerce Sylius e sistema de pagamentos online.

### Escopo
- Gestão de estações e carregadores
- Protocolo OCPP 1.6 para comunicação com carregadores
- Plataforma de e-commerce para venda de créditos e planos
- Sistema de pagamento integrado (PIX, cartão, boleto)
- Dashboard de monitoramento em tempo real
- Aplicativo móvel (futura fase 2)

---

## ⚙️ Requisitos Funcionais

### RF01 - Gestão de Estações
**Prioridade:** Alta
**Descrição:** Sistema deve permitir cadastro e gestão de estações de carregamento

#### Funcionalidades:
- ✅ Cadastro de estações com localização geográfica (lat/lng)
- ✅ Definição de horário de funcionamento
- ✅ Configuração de amenidades (WiFi, banheiro, loja)
- ✅ Upload de fotos da estação
- ✅ Instruções de acesso (portão, estacionamento)
- ✅ Definição de estação pública ou privada
- ✅ Mapa interativo com estações disponíveis

#### Regras de Negócio:
- RN01.1: Coordenadas devem ser válidas (lat: -90 a 90, lng: -180 a 180)
- RN01.2: Endereço deve ser validado via API de geocodificação
- RN01.3: Raio mínimo de 500m entre estações concorrentes

---

### RF02 - Gestão de Carregadores
**Prioridade:** Alta
**Descrição:** Sistema deve gerenciar carregadores individuais

#### Funcionalidades:
- ✅ Cadastro de carregadores (DC/AC, potência, conector)
- ✅ Monitoramento de status em tempo real (Available, Occupied, Faulted)
- ✅ Histórico de manutenções
- ✅ Atualização de firmware remota (OTA)
- ✅ Configuração de tarifas por carregador
- ✅ Diagnóstico remoto de falhas

#### Regras de Negócio:
- RN02.1: Cada carregador deve ter serial number único
- RN02.2: Carregador sem heartbeat por 10min = status Offline
- RN02.3: Carregador com erro crítico bloqueia novas sessões
- RN02.4: Potência máxima: AC até 43kW, DC até 350kW

---

### RF03 - Sessões de Carregamento
**Prioridade:** Alta
**Descrição:** Gerenciar todo ciclo de vida de uma sessão de carregamento

#### Funcionalidades:
- ✅ Iniciar sessão via app, RFID ou QR Code
- ✅ Monitoramento em tempo real (kWh, potência, duração)
- ✅ Parar sessão manualmente ou automaticamente
- ✅ Cálculo automático de custo
- ✅ Notificações durante carregamento
- ✅ Histórico completo de sessões

#### Regras de Negócio:
- RN03.1: Apenas 1 sessão ativa por carregador
- RN03.2: Sessão cancela após 15min sem energia entregue
- RN03.3: Custo = energia (kWh) × tarifa + tempo ocioso (opcional)
- RN03.4: Cliente deve ter saldo suficiente antes de iniciar
- RN03.5: Sessão > 8h gera alerta de veículo esquecido

#### Fluxo de Sessão:
```
1. Cliente seleciona carregador
2. Sistema verifica disponibilidade + saldo
3. Sistema autoriza via OCPP (Authorize)
4. Sistema inicia transação (StartTransaction)
5. Carregador entrega energia
6. Sistema recebe MeterValues a cada 60s
7. Cliente para carregamento (ou atinge 100%)
8. Sistema finaliza transação (StopTransaction)
9. Sistema calcula custo total
10. Sistema processa pagamento
11. Sistema envia recibo por email
```

---

### RF04 - Sistema de Pagamentos
**Prioridade:** Alta
**Descrição:** Processar pagamentos de sessões de carregamento

#### Funcionalidades:
- ✅ Integração com PIX (PagSeguro/Mercado Pago)
- ✅ Pagamento com cartão de crédito/débito (Stripe)
- ✅ Boleto bancário
- ✅ Créditos pré-pagos (pacotes)
- ✅ Planos mensais (assinatura)
- ✅ Fatura detalhada mensal para frotas

#### Regras de Negócio:
- RN04.1: Pagamento deve ser processado em até 24h após sessão
- RN04.2: Falha de pagamento bloqueia novas sessões após 3 tentativas
- RN04.3: Créditos pré-pagos têm validade de 12 meses
- RN04.4: Reembolso integral se sessão < 1 kWh (falha técnica)
- RN04.5: Desconto de 10% para planos mensais

---

### RF05 - Protocolo OCPP 1.6
**Prioridade:** Crítica
**Descrição:** Implementar protocolo OCPP 1.6 completo

#### Mensagens Suportadas:

**Core Profile (Obrigatório):**
- ✅ BootNotification - Registro inicial do carregador
- ✅ Heartbeat - Keep-alive a cada 5min
- ✅ StatusNotification - Mudanças de status
- ✅ Authorize - Autorização de RFID/usuário
- ✅ StartTransaction - Início de carregamento
- ✅ StopTransaction - Fim de carregamento
- ✅ MeterValues - Dados de consumo em tempo real
- ✅ DataTransfer - Mensagens customizadas

**Smart Charging Profile (Opcional - Fase 2):**
- ⏳ SetChargingProfile - Limitar potência remotamente
- ⏳ ClearChargingProfile - Remover limitações
- ⏳ GetCompositeSchedule - Ver programação de carga

**Remote Trigger Profile:**
- ✅ RemoteStartTransaction - Iniciar carregamento remotamente
- ✅ RemoteStopTransaction - Parar carregamento remotamente

**Firmware Management:**
- ⏳ UpdateFirmware - Atualização OTA
- ⏳ GetDiagnostics - Baixar logs de diagnóstico

#### Regras de Negócio:
- RN05.1: WebSocket deve aceitar reconexão automática
- RN05.2: Mensagens não entregues vão para fila Redis
- RN05.3: Timeout de resposta: 30 segundos
- RN05.4: Retry automático: 3 tentativas com backoff exponencial

---

### RF06 - Dashboard de Monitoramento
**Prioridade:** Média
**Descrição:** Painel administrativo em tempo real

#### Funcionalidades:
- ✅ Mapa com todas estações e status
- ✅ Lista de sessões ativas em andamento
- ✅ Gráficos de consumo (dia/semana/mês)
- ✅ Alertas de carregadores offline
- ✅ Receita em tempo real
- ✅ Top 10 clientes por consumo
- ✅ Taxa de ocupação de carregadores

#### KPIs Principais:
- Total de kWh entregues (hoje/mês)
- Receita (hoje/mês/ano)
- Número de sessões (completas/canceladas)
- Tempo médio de carregamento
- Taxa de utilização (%)
- NPS (Net Promoter Score)

---

### RF07 - Gestão de Usuários
**Prioridade:** Alta
**Descrição:** Cadastro e autenticação de clientes

#### Funcionalidades:
- ✅ Cadastro com email + senha
- ✅ Login com email/senha ou Google OAuth
- ✅ Recuperação de senha por email
- ✅ Perfil de usuário (dados pessoais, veículos)
- ✅ Histórico de carregamentos
- ✅ Carteira de créditos
- ✅ Favoritar estações
- ✅ Notificações por email/SMS

#### Tipos de Usuário:
- **Cliente PF:** Pessoa física com veículo próprio
- **Gestor de Frota:** Gerencia múltiplos veículos
- **Operador:** Funcionário que gerencia estações
- **Administrador:** Acesso total ao sistema

#### Regras de Negócio:
- RN07.1: CPF/CNPJ deve ser válido e único
- RN07.2: Email deve ser confirmado antes de primeiro carregamento
- RN07.3: Senha mínima: 8 caracteres, 1 maiúscula, 1 número
- RN07.4: Sessão expira após 30 dias de inatividade

---

### RF08 - Gestão de Veículos
**Prioridade:** Média
**Descrição:** Cadastro de veículos elétricos dos clientes

#### Funcionalidades:
- ✅ Cadastro de veículo (marca, modelo, placa)
- ✅ Tipo de conector (Type 2, CCS2, CHAdeMO)
- ✅ Capacidade da bateria (kWh)
- ✅ Potência máxima de carregamento
- ✅ Tag RFID associada ao veículo
- ✅ Histórico de carregamentos do veículo

#### Regras de Negócio:
- RN08.1: Placa deve seguir padrão Mercosul (ABC1D23)
- RN08.2: Cliente pode ter até 5 veículos cadastrados
- RN08.3: Apenas 1 veículo pode ser primário
- RN08.4: RFID tag deve ser único no sistema

---

### RF09 - Notificações
**Prioridade:** Média
**Descrição:** Sistema de notificações multi-canal

#### Canais:
- ✅ Email (via SMTP/SendGrid)
- ✅ SMS (via Twilio)
- ✅ Push Notification (Firebase - Fase 2)
- ✅ WebSocket (notificações em tempo real no dashboard)

#### Eventos que Geram Notificação:
- Carregamento iniciado
- Carregamento 50% completo
- Carregamento 90% completo
- Carregamento finalizado
- Pagamento aprovado
- Pagamento falhou
- Carregador ficou disponível (para reserva)
- Créditos estão acabando (< R$ 10)

---

### RF10 - Relatórios e Analytics
**Prioridade:** Baixa (Fase 2)
**Descrição:** Geração de relatórios gerenciais

#### Relatórios:
- ✅ Relatório de faturamento mensal
- ✅ Relatório de consumo por cliente
- ✅ Relatório de utilização de carregadores
- ✅ Relatório de incidentes/falhas
- ✅ Relatório de manutenções realizadas
- ⏳ Previsão de demanda (Machine Learning)

---

## 🔒 Requisitos Não-Funcionais

### RNF01 - Performance
- **Tempo de resposta API:** < 200ms (p95)
- **Tempo de carregamento página:** < 2s
- **WebSocket latency:** < 100ms
- **Throughput:** 1000 requisições/segundo
- **Banco de dados:** < 50ms para queries simples

### RNF02 - Disponibilidade
- **Uptime:** 99.5% (máx 3.65h de downtime/mês)
- **MTBF:** 720 horas (30 dias)
- **MTTR:** < 2 horas
- **Backup:** Diário com retenção de 30 dias
- **Disaster Recovery:** RTO 4h, RPO 1h

### RNF03 - Segurança
- **Criptografia:** TLS 1.3 para comunicação
- **Senhas:** Bcrypt/Argon2 com salt
- **Tokens JWT:** Expiração de 1 hora, refresh token 30 dias
- **LGPD:** Conformidade total com anonimização de dados
- **PCI-DSS:** Nível 1 (se processar cartões)
- **Rate Limiting:** 100 req/min por IP
- **DDoS Protection:** Cloudflare ou AWS Shield

### RNF04 - Escalabilidade
- **Horizontal:** Até 10 instâncias PHP-FPM
- **Vertical:** Suporta até 32GB RAM
- **Banco de dados:** Read replicas PostgreSQL
- **Cache:** Redis cluster com 3 nós
- **CDN:** CloudFront para assets estáticos
- **Capacidade:** 100 estações, 300 carregadores, 10k usuários

### RNF05 - Usabilidade
- **Responsivo:** Mobile-first (smartphones, tablets, desktop)
- **Acessibilidade:** WCAG 2.1 nível AA
- **Internacionalização:** pt_BR, en_US, es_ES
- **Onboarding:** Wizard de 3 passos para novos usuários
- **Help Center:** Base de conhecimento integrada

### RNF06 - Manutenibilidade
- **Código:** PSR-12, PHPStan level 8
- **Documentação:** OpenAPI 3.0 para API
- **Testes:** Cobertura mínima de 80%
- **CI/CD:** GitHub Actions com deploy automático
- **Logs:** ELK Stack (Elasticsearch, Logstash, Kibana)
- **Monitoring:** Prometheus + Grafana

### RNF07 - Compatibilidade
- **Browsers:** Chrome 90+, Firefox 88+, Safari 14+, Edge 90+
- **PHP:** 8.2 ou 8.3
- **PostgreSQL:** 15+
- **Redis:** 7+
- **Docker:** 24+
- **OCPP:** 1.6 (compatível com 99% dos carregadores)

---

## 🏗️ Arquitetura do Sistema

### Diagrama de Componentes

```
┌─────────────────────────────────────────────────────────────┐
│                       FRONTEND                               │
├─────────────────────────────────────────────────────────────┤
│  React 18 + TypeScript + Tailwind CSS                       │
│  • Dashboard Admin                                           │
│  • Painel do Cliente                                         │
│  • Mapa Interativo (Google Maps)                            │
└─────────────────────────────────────────────────────────────┘
                           │ HTTPS
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                    NGINX (Load Balancer)                     │
└─────────────────────────────────────────────────────────────┘
         │                                          │
         ▼                                          ▼
┌──────────────────────┐              ┌──────────────────────┐
│   HTTP API           │              │   WebSocket Server   │
│   (Symfony/Sylius)   │              │   (Ratchet PHP)      │
│   • REST API         │              │   • OCPP 1.6         │
│   • GraphQL (opt)    │              │   • Real-time events │
└──────────────────────┘              └──────────────────────┘
         │                                          │
         └────────────┬─────────────────────────────┘
                      ▼
         ┌────────────────────────┐
         │   PostgreSQL 15        │
         │   • Charging data      │
         │   • Sylius e-commerce  │
         └────────────────────────┘
                      │
         ┌────────────┴────────────┐
         ▼                         ▼
┌─────────────────┐      ┌──────────────────┐
│  Redis 7        │      │  Message Queue   │
│  • Cache        │      │  (Redis Streams) │
│  • Sessions     │      │  • OCPP messages │
└─────────────────┘      │  • Notifications │
                         └──────────────────┘
```

### Fluxo de Dados OCPP

```
Carregador → WebSocket → Ratchet Server → Message Handler
                                                  │
                         ┌────────────────────────┴──────────┐
                         ▼                                   ▼
                   Redis Queue                         PostgreSQL
                  (async processing)                (persist transaction)
                         │
                         ▼
                   Messenger Worker
                         │
           ┌─────────────┴──────────────┐
           ▼                            ▼
     Payment Service            Notification Service
           │                            │
           ▼                            ▼
     Stripe/PagSeguro            Email/SMS/Push
```

---

## 📊 Modelo de Dados

Veja arquivo completo: [DATABASE_SCHEMA.md](architecture/DATABASE_SCHEMA.md)

### Principais Entidades:

**charging.station**
- Estação física com múltiplos carregadores
- Geolocalização (lat/lng)
- Horários de funcionamento

**charging.charger**
- Carregador individual (AC/DC)
- Potência, conector, status OCPP
- Pertence a uma station

**charging.charging_session**
- Sessão de carregamento
- Vinculada a customer (Sylius) e charger
- Energia entregue, custo, pagamento

**charging.meter_value**
- Valores de medição em tempo real
- Potência, corrente, voltagem, SoC
- Enviados via OCPP MeterValues

**charging.vehicle**
- Veículo do cliente
- Marca, modelo, placa, conector
- RFID tag para autenticação

---

## 🔌 API RESTful

Veja documentação completa: [API_DOCUMENTATION.md](API_DOCUMENTATION.md) *(a criar)*

### Base URL
```
Produção: https://api.eletroposto.com.br/api
Staging: https://staging-api.eletroposto.com.br/api
```

### Autenticação
```http
POST /api/login
Content-Type: application/json

{
  "email": "cliente@example.com",
  "password": "senha123"
}

Response:
{
  "token": "eyJhbGciOiJIUzI1NiIs...",
  "refresh_token": "def50200...",
  "expires_in": 3600
}
```

### Principais Endpoints

**Estações:**
```
GET    /api/stations              # Listar estações
GET    /api/stations/{id}         # Detalhes de estação
GET    /api/stations/nearby       # Estações próximas (lat/lng)
POST   /api/stations              # Criar estação (admin)
PUT    /api/stations/{id}         # Atualizar estação
DELETE /api/stations/{id}         # Remover estação
```

**Carregadores:**
```
GET    /api/chargers              # Listar carregadores
GET    /api/chargers/{id}         # Detalhes de carregador
GET    /api/chargers/available    # Carregadores disponíveis
PATCH  /api/chargers/{id}/status  # Atualizar status (OCPP)
```

**Sessões:**
```
GET    /api/sessions              # Minhas sessões
GET    /api/sessions/{id}         # Detalhes de sessão
POST   /api/sessions              # Iniciar sessão
POST   /api/sessions/{id}/stop    # Parar sessão
GET    /api/sessions/{id}/realtime # Dados em tempo real
```

**Pagamentos:**
```
POST   /api/payments              # Processar pagamento
GET    /api/payments/{id}         # Status de pagamento
POST   /api/credits/purchase      # Comprar créditos
GET    /api/wallet                # Saldo da carteira
```

### Rate Limiting
```
X-RateLimit-Limit: 100
X-RateLimit-Remaining: 95
X-RateLimit-Reset: 1640995200
```

---

## 🔌 Protocolo OCPP 1.6

### Formato de Mensagem

Todas as mensagens OCPP 1.6 seguem formato JSON sobre WebSocket:

```json
[
  MessageType,
  UniqueId,
  Action,
  Payload
]
```

**MessageType:**
- `2` = CALL (request do carregador)
- `3` = CALLRESULT (response do servidor)
- `4` = CALLERROR (erro)

### Exemplo: BootNotification

**Request (Charger → Server):**
```json
[
  2,
  "unique-id-123",
  "BootNotification",
  {
    "chargePointVendor": "ABB",
    "chargePointModel": "Terra 54 CJG",
    "chargePointSerialNumber": "CP001",
    "firmwareVersion": "1.2.3",
    "iccid": "89550534120300000001",
    "imsi": "208930000000001"
  }
]
```

**Response (Server → Charger):**
```json
[
  3,
  "unique-id-123",
  {
    "currentTime": "2025-01-08T10:30:00.000Z",
    "interval": 300,
    "status": "Accepted"
  }
]
```

### Implementação PHP (Ratchet)

```php
// src/WebSocket/OcppServer.php
class OcppServer implements MessageComponentInterface
{
    public function onMessage(ConnectionInterface $from, $msg): void
    {
        $ocppMsg = json_decode($msg, true);
        [$messageType, $uniqueId, $action, $payload] = $ocppMsg;

        match ($action) {
            'BootNotification' => $this->handleBootNotification($from, $uniqueId, $payload),
            'Heartbeat' => $this->handleHeartbeat($from, $uniqueId),
            'StartTransaction' => $this->handleStartTransaction($from, $uniqueId, $payload),
            'StopTransaction' => $this->handleStopTransaction($from, $uniqueId, $payload),
            'MeterValues' => $this->handleMeterValues($from, $uniqueId, $payload),
            default => $this->sendError($from, $uniqueId, 'NotImplemented')
        };
    }
}
```

---

## 🔐 Autenticação e Segurança

### JWT (JSON Web Tokens)

**Estrutura do Token:**
```json
{
  "iss": "https://api.eletroposto.com.br",
  "sub": "customer_123",
  "iat": 1640995200,
  "exp": 1640998800,
  "roles": ["ROLE_USER"],
  "email": "cliente@example.com"
}
```

**Refresh Token Flow:**
```
1. Cliente faz login → recebe access_token (1h) + refresh_token (30d)
2. Access token expira após 1h
3. Cliente usa refresh_token para obter novo access_token
4. Refresh token pode ser usado até 30 dias ou revogação
```

### LGPD Compliance

**Dados Pessoais Coletados:**
- Nome completo, CPF, email, telefone
- Endereço (para faturamento)
- Placa do veículo
- Localização (apenas durante carregamento)
- Histórico de carregamentos

**Direitos do Titular:**
- ✅ Acesso: Exportar todos dados em JSON
- ✅ Correção: Editar dados cadastrais
- ✅ Exclusão: Anonimizar conta (direito ao esquecimento)
- ✅ Portabilidade: Download de dados em CSV
- ✅ Revogação: Cancelar consentimento a qualquer momento

**Anonimização:**
```sql
-- Ao solicitar exclusão de conta:
UPDATE sylius_customer SET
  email = 'anonimizado_' || id || '@deleted.local',
  first_name = 'Anonimizado',
  last_name = 'Usuário',
  phone_number = NULL,
  deleted_at = NOW()
WHERE id = :customer_id;
```

---

## 🔗 Integrações

### Pagamento - Mercado Pago
```php
// Criar preferência de pagamento PIX
$preference = new Preference();
$preference->items = [new Item([
    'title' => 'Créditos Eletroposto',
    'quantity' => 1,
    'unit_price' => 100.00
])];
$preference->save();
```

### Pagamento - Stripe
```php
// Criar Payment Intent
$intent = \Stripe\PaymentIntent::create([
    'amount' => 10000, // R$ 100,00
    'currency' => 'brl',
    'customer' => $customerId,
]);
```

### SMS - Twilio
```php
$twilio->messages->create(
    '+5591987654321',
    [
        'from' => '+5591912345678',
        'body' => 'Seu carregamento está 90% completo!'
    ]
);
```

### Email - SendGrid
```php
$email = new \SendGrid\Mail\Mail();
$email->setFrom("noreply@eletroposto.com.br");
$email->setSubject("Carregamento Finalizado");
$email->addTo($customer->getEmail());
$email->addContent("text/html", $htmlContent);
$sendgrid->send($email);
```

### Google Maps
```javascript
// Exibir estações no mapa
const map = new google.maps.Map(document.getElementById("map"), {
  center: { lat: -1.4558, lng: -48.4902 }, // Belém
  zoom: 13,
});

stations.forEach(station => {
  new google.maps.Marker({
    position: { lat: station.latitude, lng: station.longitude },
    map: map,
    title: station.name
  });
});
```

---

## ⚡ Performance e Escalabilidade

### Otimizações de Banco de Dados

**Índices Críticos:**
```sql
CREATE INDEX idx_charger_status ON charging_charger(status) WHERE is_enabled = true;
CREATE INDEX idx_session_active ON charging_session(charger_id) WHERE status = 'Active';
CREATE INDEX idx_meter_timestamp ON charging_meter_value(timestamp);
CREATE INDEX idx_station_location ON charging_station USING GIST(ll_to_earth(latitude, longitude));
```

**Query Optimization:**
```php
// Evitar N+1 queries
$stations = $stationRepo->createQueryBuilder('s')
    ->leftJoin('s.chargers', 'c')
    ->addSelect('c')
    ->getQuery()
    ->getResult();
```

### Caching Strategy

**Redis Keys:**
```
station:{id}               # TTL: 1 hora
charger:{id}:status        # TTL: 5 minutos
session:{id}:realtime      # TTL: 30 segundos
user:{id}:wallet           # TTL: 10 minutos
```

**Cache Warming:**
```bash
# Aquecer cache de estações populares
php bin/console app:cache:warm-stations
```

### Load Balancing

**Nginx Upstream:**
```nginx
upstream php_backend {
    least_conn;
    server php1:9000 weight=3;
    server php2:9000 weight=3;
    server php3:9000 weight=2;
}
```

---

## 📝 Próximos Passos

- [ ] Implementar Messenger handlers para processamento assíncrono
- [ ] Criar testes unitários e de integração
- [ ] Configurar CI/CD com GitHub Actions
- [ ] Implementar monitoramento com Prometheus
- [ ] Criar documentação OpenAPI completa
- [ ] Desenvolver aplicativo móvel (React Native)
- [ ] Implementar Machine Learning para previsão de demanda

---

**Aprovações:**

| Papel | Nome | Assinatura | Data |
|-------|------|------------|------|
| Tech Lead | - | - | - |
| Product Owner | - | - | - |
| Arquiteto de Software | - | - | - |

**Última atualização:** Janeiro 2025
**Versão:** 1.0
