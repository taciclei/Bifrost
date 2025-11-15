# Arquitetura do Sistema
## Plataforma de Gestão de Eletropostos - OCPP 1.6

**Versão:** 1.0
**Data:** Janeiro 2025
**Status:** Planejamento

---

## 1. VISÃO GERAL DA ARQUITETURA

### 1.1 Diagrama de Alto Nível

```
┌─────────────────────────────────────────────────────────────────┐
│                      CAMADA DE APRESENTAÇÃO                      │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐     │
│  │   Web App    │    │  Mobile App  │    │  Admin Panel │     │
│  │  (Angular)   │    │   (Futuro)   │    │  (Angular)   │     │
│  └──────────────┘    └──────────────┘    └──────────────┘     │
│         │                    │                    │             │
│         └────────────────────┴────────────────────┘             │
│                             │                                    │
│                        HTTPS/REST                               │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                      CAMADA DE API GATEWAY                       │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │              API Gateway (Spring Cloud Gateway)          │  │
│  │  - Autenticação JWT                                      │  │
│  │  - Rate Limiting                                         │  │
│  │  - Roteamento                                            │  │
│  └──────────────────────────────────────────────────────────┘  │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                      CAMADA DE SERVIÇOS                          │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐            │
│  │   User      │  │  Charging   │  │  Billing    │            │
│  │  Service    │  │   Service   │  │  Service    │            │
│  └─────────────┘  └─────────────┘  └─────────────┘            │
│                                                                  │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐            │
│  │  Analytics  │  │   Station   │  │  Payment    │            │
│  │  Service    │  │   Service   │  │  Service    │            │
│  └─────────────┘  └─────────────┘  └─────────────┘            │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                    CAMADA DE INTEGRAÇÃO                          │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │              OCPP 1.6 Server (WebSocket)                 │  │
│  │  - Gestão de conexões persistentes                       │  │
│  │  - Processamento de mensagens OCPP                       │  │
│  │  - Sincronização com banco de dados                      │  │
│  └──────────────────────────────────────────────────────────┘  │
│                             │                                    │
│                    WebSocket (OCPP 1.6)                         │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                   CAMADA DE DISPOSITIVOS                         │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────┐  ┌──────────┐  ┌──────────┐  ┌──────────┐       │
│  │ Charger  │  │ Charger  │  │ Charger  │  │ Charger  │       │
│  │  DC 30kW │  │  DC 60kW │  │  AC 22kW │  │  AC 7kW  │       │
│  └──────────┘  └──────────┘  └──────────┘  └──────────┘       │
│                                                                  │
└─────────────────────────────────────────────────────────────────┘

       ┌─────────────────────────────────────────────┐
       │        CAMADA DE DADOS E CACHE              │
       ├─────────────────────────────────────────────┤
       │  ┌─────────────┐      ┌──────────────┐     │
       │  │ PostgreSQL  │      │    Redis     │     │
       │  │  Database   │      │    Cache     │     │
       │  └─────────────┘      └──────────────┘     │
       └─────────────────────────────────────────────┘
```

### 1.2 Princípios Arquiteturais

#### Microserviços (Moderado)
- **Separação de responsabilidades** por domínio de negócio
- **Independência de deploy** para serviços críticos
- **Escalabilidade horizontal** por serviço
- **Não exagerar:** Evitar over-engineering para Fase 1

#### Event-Driven Architecture
- **Mensageria assíncrona** para operações não-críticas
- **Event sourcing** para auditoria de transações
- **CQRS** para separação de leitura/escrita (opcional na Fase 1)

#### API-First Design
- **Documentação automática** com OpenAPI/Swagger
- **Versionamento** de APIs desde o início
- **Contratos bem definidos** entre frontend e backend

#### Segurança by Design
- **Zero Trust:** Autenticação em todas as camadas
- **Criptografia end-to-end** para dados sensíveis
- **LGPD compliance** desde o primeiro dia

---

## 2. STACK TECNOLÓGICO DETALHADO

### 2.1 Backend

#### Linguagem e Framework
```yaml
Linguagem: Java 21 LTS
Framework: Spring Boot 3.2+
Build Tool: Maven ou Gradle
```

**Dependências Principais:**
- **Spring Boot Starter Web:** REST APIs
- **Spring Boot Starter WebSocket:** OCPP 1.6
- **Spring Boot Starter Data JPA:** Persistência
- **Spring Boot Starter Security:** Autenticação/Autorização
- **Spring Boot Starter Validation:** Validação de dados
- **Spring Cloud Gateway:** API Gateway (opcional Fase 1)

#### Protocolo OCPP 1.6
```yaml
Biblioteca: OCPP-J (JSON) custom implementation
Transporte: WebSocket (ws:// ou wss://)
Formato: JSON
Versão: OCPP 1.6 (compatível com maioria dos carregadores)
```

**Mensagens OCPP Essenciais:**
- **BootNotification:** Registro inicial do carregador
- **Heartbeat:** Keep-alive da conexão
- **StartTransaction:** Início de sessão de recarga
- **StopTransaction:** Fim de sessão
- **StatusNotification:** Mudanças de estado
- **MeterValues:** Leituras de consumo em tempo real
- **Authorize:** Autorização de usuário/cartão
- **RemoteStartTransaction:** Início remoto via app
- **RemoteStopTransaction:** Parada remota

### 2.2 Banco de Dados

#### PostgreSQL 15+
```yaml
Versão: PostgreSQL 15.x ou 16.x
Motivo:
  - Open source robusto
  - Excelente suporte a JSON (para mensagens OCPP)
  - ACID compliant
  - Ótimo para time-series (meter values)
  - Extensões: PostGIS (futuro), pg_stat_statements
```

**Extensões Úteis:**
- **uuid-ossp:** Geração de UUIDs
- **pg_trgm:** Busca full-text
- **TimescaleDB:** Otimização de séries temporais (opcional)

#### Redis 7+
```yaml
Uso:
  - Cache de sessões ativas
  - Rate limiting
  - Status em tempo real dos carregadores
  - Fila de mensagens (Pub/Sub)
TTL: Configurável por tipo de dado
```

### 2.3 Frontend

#### Angular 17+
```yaml
Versão: Angular 17+ (Standalone Components)
UI Library: Angular Material ou PrimeNG
Maps: Google Maps API ou Leaflet
State Management: Signals (Angular 17+) ou NgRx
```

**Estrutura de Módulos:**
```
src/
├── app/
│   ├── core/              # Serviços singleton (AuthService, etc)
│   ├── shared/            # Componentes reutilizáveis
│   ├── features/
│   │   ├── auth/          # Login, registro
│   │   ├── dashboard/     # Dashboard principal
│   │   ├── map/           # Mapa de estações
│   │   ├── charging/      # Sessões de recarga
│   │   ├── billing/       # Faturas e pagamentos
│   │   └── admin/         # Painel administrativo
│   └── app.routes.ts      # Rotas (standalone)
```

### 2.4 Infraestrutura

#### Cloud Provider (AWS ou DigitalOcean)

**Opção 1: AWS (Escalável)**
```yaml
Compute:
  - ECS Fargate (containerizado) ou EC2 (t3.medium)
Database:
  - RDS PostgreSQL (db.t3.micro para início)
Cache:
  - ElastiCache Redis
Storage:
  - S3 (logs, backups)
CDN:
  - CloudFront
Monitoramento:
  - CloudWatch
```

**Custo Estimado AWS:** R$ 1.500 - R$ 2.500/mês

**Opção 2: DigitalOcean (Custo-efetivo)**
```yaml
Compute:
  - Droplet (4GB RAM, 2 vCPU) - $24/mês
Database:
  - Managed PostgreSQL (1GB) - $15/mês
Cache:
  - Managed Redis (1GB) - $15/mês
Storage:
  - Spaces (S3-compatible) - $5/mês
CDN:
  - Spaces CDN incluído
Monitoramento:
  - Managed Monitoring incluído
```

**Custo Estimado DigitalOcean:** R$ 300 - R$ 500/mês

**Recomendação Fase 1:** DigitalOcean (menor custo, simplicidade)

#### Containerização

```yaml
Container: Docker
Orquestração: Docker Compose (Fase 1) → Kubernetes (Fase 2+)
Registry: Docker Hub ou GitHub Container Registry
```

**docker-compose.yml (exemplo):**
```yaml
version: '3.8'
services:
  backend:
    image: eletropostos-backend:latest
    ports:
      - "8080:8080"
    environment:
      - SPRING_PROFILES_ACTIVE=prod
      - DATABASE_URL=jdbc:postgresql://db:5432/eletropostos
    depends_on:
      - db
      - redis

  db:
    image: postgres:15-alpine
    volumes:
      - postgres_data:/var/lib/postgresql/data
    environment:
      - POSTGRES_DB=eletropostos
      - POSTGRES_PASSWORD=${DB_PASSWORD}

  redis:
    image: redis:7-alpine
    ports:
      - "6379:6379"

  frontend:
    image: eletropostos-frontend:latest
    ports:
      - "80:80"
      - "443:443"
    depends_on:
      - backend

volumes:
  postgres_data:
```

---

## 3. ARQUITETURA DE SERVIÇOS

### 3.1 User Service

**Responsabilidades:**
- Cadastro e autenticação de usuários
- Gestão de perfis (dados pessoais, veículos)
- Recuperação de senha
- Preferências e configurações

**Tecnologias:**
- Spring Boot + Spring Security
- JWT para autenticação stateless
- BCrypt para hash de senhas
- Redis para cache de sessões

**Endpoints Principais:**
```
POST   /api/v1/users/register
POST   /api/v1/users/login
GET    /api/v1/users/profile
PUT    /api/v1/users/profile
POST   /api/v1/users/vehicles
GET    /api/v1/users/vehicles
```

### 3.2 Station Service

**Responsabilidades:**
- Cadastro de estações e carregadores
- Status em tempo real (disponível, ocupado, offline)
- Localização e busca geográfica
- Reserva de carregador (opcional)

**Tecnologias:**
- Spring Boot + JPA
- PostGIS para queries geoespaciais (futuro)
- Redis para cache de status em tempo real

**Endpoints Principais:**
```
GET    /api/v1/stations              # Listar todas
GET    /api/v1/stations/nearby       # Por coordenadas
GET    /api/v1/stations/{id}
GET    /api/v1/stations/{id}/chargers
GET    /api/v1/chargers/{id}/status
POST   /api/v1/chargers/{id}/reserve
```

### 3.3 Charging Service

**Responsabilidades:**
- Gestão de sessões de recarga
- Início/parada de recarga (integração OCPP)
- Monitoramento de consumo em tempo real
- Histórico de recargas

**Tecnologias:**
- Spring Boot + WebSocket
- OCPP 1.6 client/server
- PostgreSQL para persistência
- Redis Pub/Sub para eventos em tempo real

**Endpoints Principais:**
```
POST   /api/v1/charging/start
POST   /api/v1/charging/stop
GET    /api/v1/charging/active
GET    /api/v1/charging/history
GET    /api/v1/charging/{sessionId}/status
GET    /api/v1/charging/{sessionId}/consumption
```

**Fluxo OCPP:**
```
1. App → Backend: POST /charging/start
2. Backend → Carregador: RemoteStartTransaction (OCPP)
3. Carregador → Backend: StartTransaction (OCPP)
4. Backend → App: Session Created (WebSocket)
5. Carregador → Backend: MeterValues (OCPP periódico)
6. Backend → App: Consumption Update (WebSocket)
7. App → Backend: POST /charging/stop
8. Backend → Carregador: RemoteStopTransaction (OCPP)
9. Carregador → Backend: StopTransaction (OCPP)
10. Backend → App: Session Finished (WebSocket)
```

### 3.4 Billing Service

**Responsabilidades:**
- Cálculo de tarifas (kWh, tempo, taxas)
- Geração de faturas
- Histórico de cobranças
- Relatórios financeiros

**Tecnologias:**
- Spring Boot + JPA
- PostgreSQL
- Integração com Payment Service

**Endpoints Principais:**
```
GET    /api/v1/billing/invoices
GET    /api/v1/billing/invoices/{id}
GET    /api/v1/billing/summary
GET    /api/v1/billing/export/{month}
```

**Modelo de Tarifação:**
```java
public class TariffCalculator {
    // Base: R$ 1,00/kWh
    // Pico (+20%): 07:00-09:00, 18:00-21:00
    // Vale (-15%): 22:00-06:00
    // Assinantes: -10% adicional

    public BigDecimal calculateCost(
        ChargingSession session,
        User user
    ) {
        BigDecimal energyKwh = session.getEnergyConsumed();
        BigDecimal baseRate = BigDecimal.valueOf(1.00);

        // Aplicar multipliers por horário
        BigDecimal rate = applyTimeMultiplier(
            baseRate,
            session.getStartTime()
        );

        // Desconto assinante
        if (user.isSubscriber()) {
            rate = rate.multiply(BigDecimal.valueOf(0.90));
        }

        return energyKwh.multiply(rate);
    }
}
```

### 3.5 Payment Service

**Responsabilidades:**
- Integração com gateways de pagamento
- Processamento de cartões de crédito
- Pix (integração com banco)
- Webhooks de confirmação

**Tecnologias:**
- Spring Boot
- Stripe API (internacional)
- Mercado Pago (Brasil)
- Pix (API do banco)

**Endpoints Principais:**
```
POST   /api/v1/payments/methods
DELETE /api/v1/payments/methods/{id}
POST   /api/v1/payments/charge
POST   /api/v1/payments/refund
POST   /api/v1/payments/webhooks/stripe
POST   /api/v1/payments/webhooks/mercadopago
```

### 3.6 Analytics Service

**Responsabilidades:**
- KPIs operacionais (utilização, uptime)
- Métricas financeiras (receita, margem)
- Análise de demanda (horários, localizações)
- Dashboards administrativos

**Tecnologias:**
- Spring Boot
- PostgreSQL (queries analíticas)
- TimescaleDB (opcional para séries temporais)
- Cache Redis para dashboards

**Endpoints Principais:**
```
GET    /api/v1/analytics/kpis
GET    /api/v1/analytics/revenue/{period}
GET    /api/v1/analytics/utilization/{stationId}
GET    /api/v1/analytics/demand/heatmap
GET    /api/v1/analytics/export
```

---

## 4. SERVIDOR OCPP 1.6

### 4.1 Arquitetura OCPP

```
┌──────────────────────────────────────────────────────────┐
│                    OCPP Server Layer                      │
├──────────────────────────────────────────────────────────┤
│                                                           │
│  ┌─────────────────────────────────────────────────┐    │
│  │         WebSocket Connection Manager             │    │
│  │  - Pool de conexões persistentes                 │    │
│  │  - Heartbeat monitoring                          │    │
│  │  - Reconnection logic                            │    │
│  └─────────────────────────────────────────────────┘    │
│                         │                                 │
│  ┌─────────────────────────────────────────────────┐    │
│  │         OCPP Message Handler                     │    │
│  │  - Parse JSON messages                           │    │
│  │  - Validate against OCPP 1.6 schema             │    │
│  │  - Route to appropriate handler                  │    │
│  └─────────────────────────────────────────────────┘    │
│                         │                                 │
│  ┌──────────┬──────────┬──────────┬──────────┐          │
│  │BootNot.  │Heartbeat │StartTx   │StopTx    │...       │
│  │ Handler  │ Handler  │ Handler  │ Handler  │          │
│  └──────────┴──────────┴──────────┴──────────┘          │
│                         │                                 │
│  ┌─────────────────────────────────────────────────┐    │
│  │         Business Logic Layer                     │    │
│  │  - Update database                               │    │
│  │  - Trigger events                                │    │
│  │  - Notify clients (WebSocket)                    │    │
│  └─────────────────────────────────────────────────┘    │
│                                                           │
└──────────────────────────────────────────────────────────┘
```

### 4.2 Implementação WebSocket (Spring Boot)

```java
@Configuration
@EnableWebSocket
public class OcppWebSocketConfig implements WebSocketConfigurer {

    @Autowired
    private OcppMessageHandler ocppMessageHandler;

    @Override
    public void registerWebSocketHandlers(
        WebSocketHandlerRegistry registry
    ) {
        registry
            .addHandler(ocppMessageHandler, "/ocpp/{chargePointId}")
            .setAllowedOrigins("*"); // Configurar adequadamente
    }
}

@Component
public class OcppMessageHandler extends TextWebSocketHandler {

    private final Map<String, WebSocketSession> sessions =
        new ConcurrentHashMap<>();

    @Override
    public void afterConnectionEstablished(
        WebSocketSession session
    ) {
        String chargePointId = extractChargePointId(session);
        sessions.put(chargePointId, session);
        log.info("Charger connected: {}", chargePointId);
    }

    @Override
    protected void handleTextMessage(
        WebSocketSession session,
        TextMessage message
    ) {
        // Parse OCPP message
        OcppMessage ocppMsg = parseMessage(message.getPayload());

        // Route to handler
        switch(ocppMsg.getAction()) {
            case BOOT_NOTIFICATION:
                handleBootNotification(session, ocppMsg);
                break;
            case HEARTBEAT:
                handleHeartbeat(session, ocppMsg);
                break;
            case START_TRANSACTION:
                handleStartTransaction(session, ocppMsg);
                break;
            case STOP_TRANSACTION:
                handleStopTransaction(session, ocppMsg);
                break;
            case METER_VALUES:
                handleMeterValues(session, ocppMsg);
                break;
            case STATUS_NOTIFICATION:
                handleStatusNotification(session, ocppMsg);
                break;
            default:
                log.warn("Unknown action: {}", ocppMsg.getAction());
        }
    }

    public void sendRemoteStartTransaction(
        String chargePointId,
        String idTag
    ) {
        WebSocketSession session = sessions.get(chargePointId);
        if (session != null && session.isOpen()) {
            OcppMessage msg = OcppMessage.builder()
                .messageType(OcppMessageType.CALL)
                .uniqueId(UUID.randomUUID().toString())
                .action("RemoteStartTransaction")
                .payload(Map.of("idTag", idTag))
                .build();

            session.sendMessage(
                new TextMessage(toJson(msg))
            );
        }
    }
}
```

### 4.3 Mensagens OCPP Detalhadas

#### BootNotification (Charger → Server)
```json
[
  2,
  "unique-id-123",
  "BootNotification",
  {
    "chargePointVendor": "TGOOD",
    "chargePointModel": "DC-30kW",
    "chargePointSerialNumber": "TG-DC30-001",
    "firmwareVersion": "1.2.3",
    "iccid": "89882280666044154321",
    "imsi": "310410123456789"
  }
]
```

**Resposta (Server → Charger):**
```json
[
  3,
  "unique-id-123",
  {
    "currentTime": "2025-01-15T10:30:00Z",
    "interval": 300,
    "status": "Accepted"
  }
]
```

#### StartTransaction (Charger → Server)
```json
[
  2,
  "unique-id-456",
  "StartTransaction",
  {
    "connectorId": 1,
    "idTag": "user-rfid-12345",
    "meterStart": 0,
    "timestamp": "2025-01-15T10:35:00Z"
  }
]
```

**Resposta:**
```json
[
  3,
  "unique-id-456",
  {
    "idTagInfo": {
      "status": "Accepted"
    },
    "transactionId": 789
  }
]
```

#### MeterValues (Charger → Server)
```json
[
  2,
  "unique-id-789",
  "MeterValues",
  {
    "connectorId": 1,
    "transactionId": 789,
    "meterValue": [
      {
        "timestamp": "2025-01-15T10:40:00Z",
        "sampledValue": [
          {
            "value": "15.5",
            "context": "Sample.Periodic",
            "format": "Raw",
            "measurand": "Energy.Active.Import.Register",
            "unit": "Wh"
          },
          {
            "value": "7.2",
            "context": "Sample.Periodic",
            "measurand": "Power.Active.Import",
            "unit": "kW"
          }
        ]
      }
    ]
  }
]
```

---

## 5. SEGURANÇA

### 5.1 Autenticação e Autorização

#### JWT (JSON Web Tokens)
```yaml
Algoritmo: HS256 (HMAC SHA-256)
Expiração:
  - Access Token: 1 hora
  - Refresh Token: 7 dias
Claims:
  - sub: userId
  - email: user@email.com
  - roles: [USER, ADMIN]
  - iat: issued at
  - exp: expiration
```

**Implementação:**
```java
@Service
public class JwtService {

    @Value("${jwt.secret}")
    private String secret;

    public String generateToken(User user) {
        return Jwts.builder()
            .setSubject(user.getId().toString())
            .claim("email", user.getEmail())
            .claim("roles", user.getRoles())
            .setIssuedAt(new Date())
            .setExpiration(
                new Date(System.currentTimeMillis() + 3600000)
            )
            .signWith(SignatureAlgorithm.HS256, secret)
            .compact();
    }

    public Claims validateToken(String token) {
        return Jwts.parser()
            .setSigningKey(secret)
            .parseClaimsJws(token)
            .getBody();
    }
}
```

#### Roles e Permissões
```
ROLE_USER:
  - Ver estações
  - Iniciar/parar recarga
  - Ver histórico próprio
  - Gerenciar perfil

ROLE_PARTNER:
  - Ver métricas da estação parceira
  - Relatórios financeiros parciais

ROLE_OPERATOR:
  - Gerenciar estações
  - Ver todas as sessões
  - Suporte a clientes

ROLE_ADMIN:
  - Todas as permissões
  - Gerenciar usuários
  - Configurações do sistema
```

### 5.2 Criptografia

#### Dados em Trânsito
- **HTTPS/TLS 1.3** para todas as APIs REST
- **WSS (WebSocket Secure)** para OCPP e real-time
- **Certificate Pinning** no mobile app (futuro)

#### Dados em Repouso
- **AES-256** para dados sensíveis (CPF, cartões)
- **BCrypt** (cost factor 12) para senhas
- **Encryption at rest** no PostgreSQL (AWS RDS)

### 5.3 LGPD Compliance

```yaml
Consentimento:
  - Opt-in explícito para coleta de dados
  - Finalidade específica declarada
  - Revogação a qualquer momento

Direitos do Titular:
  - Acesso aos dados (GET /api/v1/users/data)
  - Correção (PUT /api/v1/users/profile)
  - Exclusão (DELETE /api/v1/users/account)
  - Portabilidade (GET /api/v1/users/export)

Retenção:
  - Dados de recarga: 5 anos (fins fiscais)
  - Dados pessoais: Enquanto conta ativa + 30 dias
  - Logs de acesso: 6 meses
```

**Anonimização:**
```java
@Service
public class GdprService {

    public void anonymizeUser(Long userId) {
        User user = userRepository.findById(userId)
            .orElseThrow();

        // Manter dados fiscais, anonimizar PII
        user.setName("ANONYMIZED");
        user.setEmail("deleted-" + userId + "@anonymized.com");
        user.setCpf(null);
        user.setPhone(null);
        user.setDeletedAt(LocalDateTime.now());

        userRepository.save(user);
    }
}
```

---

## 6. MONITORAMENTO E OBSERVABILIDADE

### 6.1 Métricas (Prometheus)

```yaml
Application Metrics:
  - http_requests_total
  - http_request_duration_seconds
  - charging_sessions_active
  - charging_sessions_total
  - ocpp_messages_total
  - ocpp_connection_errors_total

Business Metrics:
  - revenue_total
  - energy_consumed_kwh
  - utilization_rate_percent
  - average_session_duration_minutes
```

### 6.2 Logs (Estruturados)

```json
{
  "timestamp": "2025-01-15T10:45:00.123Z",
  "level": "INFO",
  "service": "charging-service",
  "traceId": "abc123",
  "spanId": "def456",
  "userId": "user-789",
  "action": "START_CHARGING",
  "chargerId": "charger-001",
  "message": "Charging session started successfully",
  "metadata": {
    "sessionId": "session-xyz",
    "connectorId": 1
  }
}
```

### 6.3 Alertas

```yaml
Críticos (PagerDuty):
  - OCPP server down
  - Database connection lost
  - Pagamento falhou >5x em 10min

Warnings (Slack):
  - Charger offline >15min
  - API latency >1s (p95)
  - Disk usage >80%

Info (Email):
  - Daily revenue report
  - Weekly utilization summary
```

---

## 7. ESCALABILIDADE

### 7.1 Horizontal Scaling

```yaml
Load Balancer (Nginx/AWS ALB):
  - Round-robin para API servers
  - Sticky sessions para WebSocket

Backend Pods:
  - Stateless design
  - Configuração via environment variables
  - Escalar de 2 → 10 pods conforme carga

Database:
  - Read replicas para queries analíticas
  - Connection pooling (HikariCP)
  - Índices otimizados
```

### 7.2 Caching Strategy

```
L1 (Application Cache - Caffeine):
  - Configurações do sistema (TTL: 1h)
  - Tarifas (TTL: 1h)

L2 (Redis):
  - Sessões ativas (TTL: 24h)
  - Status de carregadores (TTL: 30s)
  - User profiles (TTL: 15min)

Database:
  - Source of truth
  - Write-through cache
```

---

## 8. PRÓXIMOS PASSOS

1. **Protótipo OCPP:** Implementar servidor básico (3 semanas)
2. **APIs REST:** Desenvolver endpoints core (4 semanas)
3. **Frontend MVP:** Telas essenciais (4 semanas)
4. **Integração:** Testes com carregador real ou simulador (2 semanas)
5. **Deploy Staging:** Ambiente de homologação (1 semana)

---

**Documento Técnico**
**Revisão:** Mensal durante desenvolvimento
**Aprovação:** Arquiteto de Software + CTO
