# 📊 Monitoring e Observabilidade - Eletroposto

**Versão:** 1.0
**Data:** Janeiro 2025

---

## 📑 Índice

1. [Estratégia de Observabilidade](#estratégia-de-observabilidade)
2. [Stack de Monitoring](#stack-de-monitoring)
3. [Métricas](#métricas)
4. [Logs](#logs)
5. [Traces Distribuídos](#traces-distribuídos)
6. [Alertas](#alertas)
7. [Dashboards](#dashboards)
8. [SLOs e SLAs](#slos-e-slas)

---

## 🎯 Estratégia de Observabilidade

### Os 3 Pilares

```
┌─────────────────────────────────────────┐
│         OBSERVABILIDADE                 │
├─────────────────────────────────────────┤
│                                         │
│  📊 MÉTRICAS    📝 LOGS    🔍 TRACES   │
│  (Prometheus)  (ELK Stack)  (Jaeger)   │
│                                         │
└─────────────────────────────────────────┘
```

### Objetivos

- ✅ **Visibilidade Total:** 100% do sistema monitorado
- ✅ **Detecção Proativa:** Alertas antes de clientes perceberem
- ✅ **MTTR < 30min:** Tempo médio para resolver incidentes
- ✅ **Retenção:** 30 dias (métricas), 90 dias (logs)
- ✅ **Custo:** < R$ 5.000/mês (serviços managed)

---

## 🛠️ Stack de Monitoring

### Arquitetura

```
┌─────────────────┐
│   Aplicação     │
│   (PHP/Nginx)   │
└────────┬────────┘
         │ metrics/logs/traces
         ▼
┌─────────────────────────────────┐
│      Collectors                 │
│  • Prometheus Exporter          │
│  • Filebeat (logs)              │
│  • Jaeger Agent (traces)        │
└────────┬────────────────────────┘
         │
         ▼
┌─────────────────────────────────┐
│      Storage & Processing       │
│  • Prometheus (métricas)        │
│  • Elasticsearch (logs)         │
│  • Jaeger (traces)              │
└────────┬────────────────────────┘
         │
         ▼
┌─────────────────────────────────┐
│      Visualização               │
│  • Grafana (dashboards)         │
│  • Kibana (análise de logs)     │
│  • Jaeger UI (traces)           │
└─────────────────────────────────┘
         │
         ▼
┌─────────────────────────────────┐
│      Alertas                    │
│  • AlertManager (Prometheus)    │
│  • PagerDuty (on-call)          │
│  • Slack (notificações)         │
└─────────────────────────────────┘
```

### Ferramentas

| Componente | Ferramenta | Alternativa Managed |
|------------|-----------|---------------------|
| **Métricas** | Prometheus | Datadog, New Relic |
| **Logs** | ELK Stack | CloudWatch Logs, Loggly |
| **Traces** | Jaeger | Zipkin, AWS X-Ray |
| **Dashboards** | Grafana | Datadog, Kibana |
| **Alertas** | AlertManager | PagerDuty |
| **APM** | - | New Relic, Datadog APM |
| **Uptime** | Uptime Robot | Pingdom, StatusCake |

---

## 📊 Métricas

### Métricas de Aplicação (Custom)

#### 1. Sessões de Carregamento

```prometheus
# Total de sessões ativas
eletroposto_sessions_active{station_id="1",charger_id="5"}

# Duração média de sessão (minutos)
eletroposto_session_duration_minutes_avg

# Energia total entregue (kWh)
eletroposto_energy_delivered_kwh_total

# Taxa de sucesso de sessões
eletroposto_sessions_success_rate

# Sessões por status
eletroposto_sessions_by_status{status="active|completed|cancelled|faulted"}
```

**Implementação (PHP):**

```php
<?php

use Prometheus\CollectorRegistry;
use Prometheus\Storage\Redis;

class MetricsService
{
    private CollectorRegistry $registry;

    public function __construct()
    {
        $adapter = new Redis(['host' => 'redis']);
        $this->registry = new CollectorRegistry($adapter);
    }

    public function recordSessionStarted(int $stationId, int $chargerId): void
    {
        $counter = $this->registry->getOrRegisterCounter(
            'eletroposto',
            'sessions_started_total',
            'Total sessions started',
            ['station_id', 'charger_id']
        );

        $counter->inc([(string) $stationId, (string) $chargerId]);
    }

    public function recordEnergyDelivered(float $kwh): void
    {
        $counter = $this->registry->getOrRegisterCounter(
            'eletroposto',
            'energy_delivered_kwh_total',
            'Total energy delivered in kWh'
        );

        $counter->incBy($kwh);
    }

    public function setActiveSessionsGauge(int $count): void
    {
        $gauge = $this->registry->getOrRegisterGauge(
            'eletroposto',
            'sessions_active',
            'Number of active charging sessions'
        );

        $gauge->set($count);
    }
}
```

#### 2. OCPP WebSocket

```prometheus
# Conexões WebSocket ativas
eletroposto_ocpp_connections_active

# Mensagens OCPP por tipo
eletroposto_ocpp_messages_total{message_type="BootNotification|Heartbeat|StartTransaction"}

# Tempo de processamento de mensagem (ms)
eletroposto_ocpp_message_processing_duration_ms

# Erros OCPP
eletroposto_ocpp_errors_total{error_type="timeout|invalid_message"}
```

#### 3. Pagamentos

```prometheus
# Receita total
eletroposto_revenue_total_brl

# Pagamentos por método
eletroposto_payments_by_method{method="pix|credit_card|debit_card"}

# Taxa de sucesso de pagamentos
eletroposto_payments_success_rate

# Tempo médio de aprovação (segundos)
eletroposto_payment_approval_duration_seconds
```

---

### Métricas de Infraestrutura

#### System (Node Exporter)

```prometheus
# CPU usage
node_cpu_seconds_total
rate(node_cpu_seconds_total[5m])

# Memory usage
node_memory_MemAvailable_bytes
node_memory_MemTotal_bytes

# Disk usage
node_filesystem_avail_bytes
node_filesystem_size_bytes

# Network I/O
rate(node_network_receive_bytes_total[5m])
rate(node_network_transmit_bytes_total[5m])
```

#### Docker Containers (cAdvisor)

```prometheus
# Container CPU
container_cpu_usage_seconds_total

# Container Memory
container_memory_usage_bytes

# Container Network
container_network_receive_bytes_total
container_network_transmit_bytes_total
```

#### PostgreSQL (postgres_exporter)

```prometheus
# Conexões ativas
pg_stat_activity_count

# Queries por segundo
rate(pg_stat_database_xact_commit[1m])

# Tamanho do banco
pg_database_size_bytes{datname="eletroposto"}

# Locks
pg_locks_count

# Replication lag (se houver replica)
pg_replication_lag_seconds
```

#### Redis (redis_exporter)

```prometheus
# Connected clients
redis_connected_clients

# Memory usage
redis_memory_used_bytes

# Hit rate
redis_keyspace_hits_total / (redis_keyspace_hits_total + redis_keyspace_misses_total)

# Evicted keys
redis_evicted_keys_total
```

---

### Exportar Métricas

**Endpoint:** `GET /metrics`

```php
<?php

// public/metrics.php
use Prometheus\RenderTextFormat;

$adapter = new \Prometheus\Storage\Redis(['host' => 'redis']);
$registry = new \Prometheus\CollectorRegistry($adapter);

header('Content-Type: ' . RenderTextFormat::MIME_TYPE);
echo (new RenderTextFormat())->render($registry->getMetricFamilySamples());
```

**Prometheus config (`prometheus.yml`):**

```yaml
scrape_configs:
  - job_name: 'eletroposto-api'
    static_configs:
      - targets: ['php:9000']
    metrics_path: '/metrics'
    scrape_interval: 30s

  - job_name: 'node-exporter'
    static_configs:
      - targets: ['node-exporter:9100']

  - job_name: 'postgres-exporter'
    static_configs:
      - targets: ['postgres-exporter:9187']
```

---

## 📝 Logs

### Estrutura de Logs (JSON)

```json
{
  "timestamp": "2025-01-08T10:30:00.123Z",
  "level": "INFO",
  "message": "Charging session started",
  "context": {
    "session_id": 42,
    "customer_id": 123,
    "charger_id": 5,
    "station_id": 1
  },
  "extra": {
    "ip": "192.168.1.100",
    "user_agent": "EletropostoApp/1.0",
    "request_id": "req_abc123"
  }
}
```

### Níveis de Log

| Nível | Uso | Exemplos |
|-------|-----|----------|
| **DEBUG** | Desenvolvimento | Valores de variáveis, flow de execução |
| **INFO** | Eventos normais | Session started, Payment approved |
| **WARNING** | Situações anormais não críticas | High memory usage, Slow query |
| **ERROR** | Erros que precisam atenção | Payment failed, Database connection error |
| **CRITICAL** | Sistema comprometido | Out of memory, Database offline |

### Configuração Monolog (Symfony)

```yaml
# config/packages/monolog.yaml
monolog:
    channels: ['app', 'ocpp', 'payment', 'audit']

    handlers:
        # Produção: JSON para ELK
        main:
            type: stream
            path: php://stdout
            level: info
            formatter: 'monolog.formatter.json'

        # Erros para arquivo separado
        error_file:
            type: stream
            path: '%kernel.logs_dir%/error.log'
            level: error

        # OCPP em canal separado
        ocpp:
            type: stream
            path: '%kernel.logs_dir%/ocpp.log'
            level: debug
            channels: ['ocpp']
            formatter: 'monolog.formatter.json'

        # Audit trail (imutável, para compliance LGPD)
        audit:
            type: stream
            path: '%kernel.logs_dir%/audit.log'
            level: info
            channels: ['audit']

        # Slack para erros críticos
        slack:
            type: slack
            token: '%env(SLACK_TOKEN)%'
            channel: '#eletroposto-alerts'
            level: critical
            include_extra: true
```

### Logs Estruturados

```php
<?php

use Psr\Log\LoggerInterface;

class ChargingSessionService
{
    public function __construct(
        private LoggerInterface $logger
    ) {}

    public function startSession(int $chargerId, int $customerId): ChargingSession
    {
        $this->logger->info('Starting charging session', [
            'charger_id' => $chargerId,
            'customer_id' => $customerId,
            'action' => 'session_start',
        ]);

        try {
            // ...
            $session = new ChargingSession();

            $this->logger->info('Charging session started successfully', [
                'session_id' => $session->getId(),
                'charger_id' => $chargerId,
                'customer_id' => $customerId,
            ]);

            return $session;

        } catch (\Exception $e) {
            $this->logger->error('Failed to start charging session', [
                'charger_id' => $chargerId,
                'customer_id' => $customerId,
                'error' => $e->getMessage(),
                'exception' => get_class($e),
            ]);

            throw $e;
        }
    }
}
```

### ELK Stack Setup

**docker-compose.yml:**

```yaml
elasticsearch:
  image: docker.elastic.co/elasticsearch/elasticsearch:8.11.0
  environment:
    - discovery.type=single-node
    - xpack.security.enabled=false
  ports:
    - "9200:9200"
  volumes:
    - elasticsearch_data:/usr/share/elasticsearch/data

logstash:
  image: docker.elastic.co/logstash/logstash:8.11.0
  volumes:
    - ./infrastructure/elk/logstash.conf:/usr/share/logstash/pipeline/logstash.conf
  depends_on:
    - elasticsearch

filebeat:
  image: docker.elastic.co/beats/filebeat:8.11.0
  volumes:
    - ./infrastructure/elk/filebeat.yml:/usr/share/filebeat/filebeat.yml
    - /var/lib/docker/containers:/var/lib/docker/containers:ro
  depends_on:
    - elasticsearch

kibana:
  image: docker.elastic.co/kibana/kibana:8.11.0
  ports:
    - "5601:5601"
  environment:
    ELASTICSEARCH_HOSTS: http://elasticsearch:9200
  depends_on:
    - elasticsearch
```

**Queries Úteis (Kibana):**

```
# Todos os erros nas últimas 24h
level:ERROR AND @timestamp:[now-24h TO now]

# Sessões que falharam
message:"session" AND level:ERROR

# Pagamentos PIX aprovados
channel:payment AND message:"approved" AND payment_method:pix

# Latência > 1s
response_time_ms:>1000

# Usuário específico
customer_id:123 AND @timestamp:[now-7d TO now]
```

---

## 🔍 Traces Distribuídos (Jaeger)

### Instrumentação

```php
<?php

use OpenTelemetry\API\Trace\Span;
use OpenTelemetry\SDK\Trace\TracerProvider;

class ChargingSessionService
{
    public function startSession(int $chargerId, int $customerId): ChargingSession
    {
        $tracer = TracerProvider::getTracer('eletroposto');

        $span = $tracer->spanBuilder('start_session')
            ->setSpanKind(SpanKind::KIND_SERVER)
            ->startSpan();

        $span->setAttribute('charger.id', $chargerId);
        $span->setAttribute('customer.id', $customerId);

        try {
            // Validar disponibilidade
            $validationSpan = $tracer->spanBuilder('validate_charger')
                ->startSpan();

            $this->validateChargerAvailability($chargerId);

            $validationSpan->end();

            // Criar sessão
            $dbSpan = $tracer->spanBuilder('create_session_db')
                ->startSpan();

            $session = $this->createSession($chargerId, $customerId);

            $dbSpan->end();

            // Enviar comando OCPP
            $ocppSpan = $tracer->spanBuilder('send_ocpp_start')
                ->startSpan();

            $this->ocppClient->sendRemoteStartTransaction($session);

            $ocppSpan->end();

            $span->setStatus(StatusCode::OK);
            return $session;

        } catch (\Exception $e) {
            $span->recordException($e);
            $span->setStatus(StatusCode::ERROR, $e->getMessage());
            throw $e;

        } finally {
            $span->end();
        }
    }
}
```

### Visualizar Traces

**Jaeger UI:** http://localhost:16686

**Exemplo de Trace:**

```
start_session (2.3s)
  ├─ validate_charger (120ms)
  ├─ create_session_db (45ms)
  │  └─ INSERT charging_session (30ms)
  └─ send_ocpp_start (1.9s)
     ├─ websocket_send (50ms)
     └─ await_response (1.8s)
```

---

## 🚨 Alertas

### Regras de Alerta (AlertManager)

```yaml
# prometheus/alerts.yml
groups:
  - name: eletroposto_api
    interval: 30s
    rules:
      # Alta taxa de erro
      - alert: HighErrorRate
        expr: |
          (
            sum(rate(http_requests_total{status=~"5.."}[5m]))
            /
            sum(rate(http_requests_total[5m]))
          ) > 0.05
        for: 5m
        labels:
          severity: critical
        annotations:
          summary: "High HTTP error rate"
          description: "Error rate is {{ $value | humanizePercentage }} (threshold: 5%)"

      # Latência alta
      - alert: HighLatency
        expr: |
          histogram_quantile(0.95,
            rate(http_request_duration_seconds_bucket[5m])
          ) > 1.0
        for: 10m
        labels:
          severity: warning
        annotations:
          summary: "High API latency"
          description: "P95 latency is {{ $value }}s (threshold: 1s)"

      # Carregadores offline
      - alert: ChargersOffline
        expr: |
          eletroposto_chargers_offline > 2
        for: 15m
        labels:
          severity: warning
        annotations:
          summary: "Multiple chargers offline"
          description: "{{ $value }} chargers are offline"

      # Sessões travadas
      - alert: StuckSessions
        expr: |
          count(
            eletroposto_sessions_active
            AND
            time() - eletroposto_session_start_timestamp > 28800
          ) > 0
        labels:
          severity: warning
        annotations:
          summary: "Sessions stuck for > 8 hours"
          description: "{{ $value }} sessions are stuck"

  - name: infrastructure
    interval: 30s
    rules:
      # CPU alta
      - alert: HighCPUUsage
        expr: |
          (100 - (avg by (instance) (rate(node_cpu_seconds_total{mode="idle"}[5m])) * 100)) > 85
        for: 10m
        labels:
          severity: warning
        annotations:
          summary: "High CPU usage on {{ $labels.instance }}"
          description: "CPU usage is {{ $value | humanize }}%"

      # Memória alta
      - alert: HighMemoryUsage
        expr: |
          (1 - (node_memory_MemAvailable_bytes / node_memory_MemTotal_bytes)) > 0.90
        for: 5m
        labels:
          severity: critical
        annotations:
          summary: "High memory usage"
          description: "Memory usage is {{ $value | humanizePercentage }}"

      # Disco cheio
      - alert: DiskSpaceLow
        expr: |
          (node_filesystem_avail_bytes / node_filesystem_size_bytes) < 0.15
        for: 10m
        labels:
          severity: warning
        annotations:
          summary: "Disk space low"
          description: "Only {{ $value | humanizePercentage }} available"

      # PostgreSQL conexões
      - alert: PostgreSQLHighConnections
        expr: |
          pg_stat_activity_count > 80
        for: 5m
        labels:
          severity: warning
        annotations:
          summary: "High PostgreSQL connections"
          description: "{{ $value }} active connections (max 100)"
```

### Canais de Notificação

**Slack Integration:**

```yaml
# alertmanager.yml
route:
  receiver: 'slack-general'
  group_by: ['alertname', 'severity']
  group_wait: 10s
  group_interval: 10m
  repeat_interval: 12h

  routes:
    # Críticos vão para PagerDuty
    - match:
        severity: critical
      receiver: 'pagerduty'
      continue: true

    # Warnings apenas Slack
    - match:
        severity: warning
      receiver: 'slack-warnings'

receivers:
  - name: 'slack-general'
    slack_configs:
      - api_url: 'https://hooks.slack.com/services/T00/B00/XXX'
        channel: '#eletroposto-alerts'
        title: '{{ .GroupLabels.alertname }}'
        text: '{{ range .Alerts }}{{ .Annotations.description }}{{ end }}'

  - name: 'pagerduty'
    pagerduty_configs:
      - service_key: 'xxx'
        description: '{{ .GroupLabels.alertname }}: {{ .Annotations.summary }}'
```

---

## 📈 Dashboards

### Grafana Dashboard: Overview

**Painéis:**

1. **KPIs Principais** (Single Stats)
   - Sessões Ativas
   - Receita (hoje/mês)
   - Carregadores Online
   - Taxa de Erro

2. **Gráfico de Sessões** (Time Series)
   - Sessões por status ao longo do tempo
   - Comparação com semana anterior

3. **Energia Entregue** (Gauge)
   - Total kWh (hoje)
   - Meta diária

4. **Latência da API** (Heatmap)
   - P50, P95, P99
   - Por endpoint

5. **Carregadores** (Pie Chart)
   - Distribuição por status (Available, Occupied, Offline)

6. **Top Estações** (Table)
   - Por número de sessões
   - Por receita

### Exemplo de Query (PromQL)

```promql
# Taxa de sucesso de sessões (últimas 24h)
sum(rate(eletroposto_sessions_total{status="completed"}[24h]))
/
sum(rate(eletroposto_sessions_total[24h]))

# Receita por hora
sum(rate(eletroposto_revenue_total_brl[1h])) * 3600

# Carregadores disponíveis
eletroposto_chargers{status="Available"}

# Latência P95 da API
histogram_quantile(0.95,
  rate(http_request_duration_seconds_bucket[5m])
)
```

---

## 📏 SLOs e SLAs

### Service Level Objectives (SLOs)

| Métrica | SLO | Medição | Budget de Erro |
|---------|-----|---------|----------------|
| **Uptime** | 99.5% | Uptime checks (5min) | 3.65h/mês |
| **Latência (P95)** | < 500ms | Todos os endpoints | - |
| **Taxa de Erro** | < 1% | HTTP 5xx / Total | - |
| **Sucesso de Sessões** | > 98% | Sessions completed / Total | - |
| **Tempo de Resposta Suporte** | < 2h | Tickets P1 | - |

### Error Budget

```
Error Budget Mensal = (1 - SLO) × Total de Requisições

Exemplo:
- SLO Uptime: 99.5%
- Downtime permitido: 0.5% de 720h = 3.65h
- Se houver 2h de downtime, restam 1.65h de budget
```

**Monitoramento:**

```promql
# Uptime atual (últimos 30 dias)
avg_over_time(up{job="eletroposto-api"}[30d])

# Error budget consumido (%)
(1 - (
  sum(rate(http_requests_total{status!~"5.."}[30d]))
  /
  sum(rate(http_requests_total[30d]))
)) * 100
```

---

## ✅ Checklist de Implementação

### Fase 1: Fundação (Semana 1-2)
- [ ] Instalar Prometheus + Grafana
- [ ] Configurar exporters (node, postgres, redis)
- [ ] Implementar métricas custom básicas
- [ ] Criar dashboard de overview

### Fase 2: Logs (Semana 3-4)
- [ ] Configurar ELK Stack
- [ ] Implementar logs estruturados (JSON)
- [ ] Criar índices no Elasticsearch
- [ ] Configurar Kibana dashboards

### Fase 3: Alertas (Semana 5-6)
- [ ] Configurar AlertManager
- [ ] Definir regras de alerta
- [ ] Integrar Slack + PagerDuty
- [ ] Testar on-call rotation

### Fase 4: Traces (Semana 7-8)
- [ ] Instalar Jaeger
- [ ] Instrumentar código com OpenTelemetry
- [ ] Testar traces end-to-end

### Fase 5: Otimização (Contínuo)
- [ ] Analisar queries lentas
- [ ] Otimizar dashboards
- [ ] Refinar alertas (reduzir false positives)
- [ ] Documentar runbooks

---

**Responsável:** Equipe DevOps + SRE
**Revisão:** Trimestral
**Última atualização:** Janeiro 2025
