# 📚 Documentação da API - Eletroposto

**Versão da API:** 1.0
**Base URL:** `https://api.eletroposto.com.br/api`
**Protocolo:** HTTPS
**Formato:** JSON

---

## 📑 Índice

1. [Introdução](#introdução)
2. [Autenticação](#autenticação)
3. [Códigos de Status HTTP](#códigos-de-status-http)
4. [Paginação](#paginação)
5. [Rate Limiting](#rate-limiting)
6. [Endpoints](#endpoints)
7. [Webhooks](#webhooks)
8. [Erros](#erros)
9. [Exemplos de Integração](#exemplos-de-integração)

---

## 🚀 Introdução

A API Eletroposto permite integração completa com o sistema de gestão de eletropostos. Com ela você pode:

- ✅ Listar estações e carregadores disponíveis
- ✅ Iniciar e parar sessões de carregamento
- ✅ Consultar histórico de carregamentos
- ✅ Processar pagamentos
- ✅ Receber notificações em tempo real

### Ambientes

| Ambiente | Base URL | Uso |
|----------|----------|-----|
| **Produção** | `https://api.eletroposto.com.br/api` | Aplicações em produção |
| **Staging** | `https://staging-api.eletroposto.com.br/api` | Testes e homologação |
| **Sandbox** | `https://sandbox-api.eletroposto.com.br/api` | Desenvolvimento |

### Versionamento

A API utiliza versionamento via URL:
```
https://api.eletroposto.com.br/api/v1/stations
```

---

## 🔐 Autenticação

A API utiliza **JWT (JSON Web Tokens)** para autenticação.

### 1. Obter Token de Acesso

**Endpoint:** `POST /api/login`

**Request:**
```http
POST /api/login HTTP/1.1
Host: api.eletroposto.com.br
Content-Type: application/json

{
  "email": "cliente@example.com",
  "password": "senha123"
}
```

**Response (200 OK):**
```json
{
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
  "refresh_token": "def50200a1b2c3d4e5f6...",
  "expires_in": 3600,
  "token_type": "Bearer",
  "user": {
    "id": 123,
    "email": "cliente@example.com",
    "name": "João Silva"
  }
}
```

### 2. Usar Token nas Requisições

Inclua o token no header `Authorization`:

```http
GET /api/stations HTTP/1.1
Host: api.eletroposto.com.br
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
```

### 3. Renovar Token

Quando o `access_token` expirar (após 1 hora), use o `refresh_token`:

**Endpoint:** `POST /api/token/refresh`

**Request:**
```json
{
  "refresh_token": "def50200a1b2c3d4e5f6..."
}
```

**Response:**
```json
{
  "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
  "refresh_token": "def50200a1b2c3d4e5f6...",
  "expires_in": 3600
}
```

---

## 📊 Códigos de Status HTTP

| Código | Significado | Descrição |
|--------|-------------|-----------|
| **200** | OK | Requisição bem-sucedida |
| **201** | Created | Recurso criado com sucesso |
| **204** | No Content | Requisição bem-sucedida sem conteúdo de retorno |
| **400** | Bad Request | Dados inválidos na requisição |
| **401** | Unauthorized | Token ausente ou inválido |
| **403** | Forbidden | Sem permissão para acessar recurso |
| **404** | Not Found | Recurso não encontrado |
| **409** | Conflict | Conflito (ex: recurso já existe) |
| **422** | Unprocessable Entity | Validação falhou |
| **429** | Too Many Requests | Rate limit excedido |
| **500** | Internal Server Error | Erro no servidor |
| **503** | Service Unavailable | Serviço temporariamente indisponível |

---

## 📄 Paginação

Endpoints que retornam listas suportam paginação:

**Query Parameters:**
- `page`: Número da página (padrão: 1)
- `itemsPerPage`: Itens por página (padrão: 30, máx: 100)

**Exemplo:**
```http
GET /api/stations?page=2&itemsPerPage=50
```

**Response Headers:**
```
X-Total-Count: 150
X-Page-Count: 3
X-Current-Page: 2
X-Per-Page: 50
```

**Response Body:**
```json
{
  "data": [ /* ... */ ],
  "pagination": {
    "total": 150,
    "count": 50,
    "per_page": 50,
    "current_page": 2,
    "total_pages": 3,
    "links": {
      "first": "/api/stations?page=1",
      "last": "/api/stations?page=3",
      "prev": "/api/stations?page=1",
      "next": "/api/stations?page=3"
    }
  }
}
```

---

## ⏱️ Rate Limiting

Para proteger a API contra abuso, aplicamos limites de requisições:

| Tipo de Usuário | Limite | Janela |
|-----------------|--------|--------|
| **Gratuito** | 60 req | 1 minuto |
| **Autenticado** | 100 req | 1 minuto |
| **Premium** | 500 req | 1 minuto |
| **Enterprise** | 5000 req | 1 minuto |

**Response Headers:**
```
X-RateLimit-Limit: 100
X-RateLimit-Remaining: 95
X-RateLimit-Reset: 1640995200
```

**Se limite for excedido (429):**
```json
{
  "error": "rate_limit_exceeded",
  "message": "Você excedeu o limite de 100 requisições por minuto",
  "retry_after": 42
}
```

---

## 🔌 Endpoints

### Estações (Stations)

#### Listar Estações

**Endpoint:** `GET /api/stations`

**Query Parameters:**
- `city` (string): Filtrar por cidade
- `status` (string): Online, Offline, Maintenance
- `isPublic` (boolean): true/false
- `sort` (string): name, created_at (padrão: name)
- `order` (string): asc, desc (padrão: asc)

**Exemplo:**
```http
GET /api/stations?city=Belém&status=Online&isPublic=true
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Eletroposto Shopping Pátio Belém",
      "description": "Estação de carregamento rápido",
      "latitude": -1.4558,
      "longitude": -48.4902,
      "address": "Av. Augusto Montenegro, 4300",
      "city": "Belém",
      "state": "PA",
      "zipCode": "66635-110",
      "status": "Online",
      "isPublic": true,
      "openingHours": {
        "monday": "06:00-22:00",
        "tuesday": "06:00-22:00",
        "sunday": "08:00-20:00"
      },
      "amenities": ["wifi", "restroom", "coffee"],
      "availableChargersCount": 2,
      "totalChargersCount": 3,
      "createdAt": "2025-01-01T10:00:00+00:00",
      "updatedAt": "2025-01-08T15:30:00+00:00"
    }
  ],
  "pagination": { /* ... */ }
}
```

---

#### Estações Próximas

**Endpoint:** `GET /api/stations/nearby`

**Query Parameters:**
- `latitude` (float, obrigatório): Latitude
- `longitude` (float, obrigatório): Longitude
- `radius` (int): Raio em km (padrão: 10, máx: 50)

**Exemplo:**
```http
GET /api/stations/nearby?latitude=-1.4558&longitude=-48.4902&radius=5
```

**Response (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Eletroposto Shopping Pátio Belém",
      "distance": 2.3,
      "distanceUnit": "km",
      "latitude": -1.4558,
      "longitude": -48.4902,
      "availableChargersCount": 2
    }
  ]
}
```

---

#### Detalhes de Estação

**Endpoint:** `GET /api/stations/{id}`

**Exemplo:**
```http
GET /api/stations/1
Authorization: Bearer {token}
```

**Response (200 OK):**
```json
{
  "id": 1,
  "name": "Eletroposto Shopping Pátio Belém",
  "description": "Estação de carregamento rápido com 3 pontos",
  "latitude": -1.4558,
  "longitude": -48.4902,
  "address": "Av. Augusto Montenegro, 4300",
  "city": "Belém",
  "state": "PA",
  "zipCode": "66635-110",
  "status": "Online",
  "isPublic": true,
  "chargers": [
    {
      "id": 1,
      "serialNumber": "CP001",
      "model": "Terra 54 CJG",
      "manufacturer": "ABB",
      "powerKw": 60,
      "status": "Available",
      "chargerType": "DC",
      "connectorType": "CCS2",
      "isOnline": true
    },
    {
      "id": 2,
      "serialNumber": "CP002",
      "model": "Terra 54 CJG",
      "manufacturer": "ABB",
      "powerKw": 60,
      "status": "Occupied",
      "chargerType": "DC",
      "connectorType": "CCS2",
      "isOnline": true
    }
  ]
}
```

---

### Carregadores (Chargers)

#### Listar Carregadores Disponíveis

**Endpoint:** `GET /api/chargers/available`

**Query Parameters:**
- `connectorType` (string): Type 2, CCS2, CHAdeMO, GB/T
- `minPowerKw` (int): Potência mínima
- `stationId` (int): Filtrar por estação

**Exemplo:**
```http
GET /api/chargers/available?connectorType=CCS2&minPowerKw=50
```

**Response (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "serialNumber": "CP001",
      "model": "Terra 54 CJG",
      "manufacturer": "ABB",
      "powerKw": 60,
      "status": "Available",
      "chargerType": "DC",
      "connectorType": "CCS2",
      "station": {
        "id": 1,
        "name": "Eletroposto Shopping Pátio Belém",
        "city": "Belém"
      }
    }
  ]
}
```

---

### Sessões de Carregamento (Charging Sessions)

#### Iniciar Sessão

**Endpoint:** `POST /api/sessions`

**Request:**
```json
{
  "chargerId": 1,
  "vehicleId": 5,
  "rfidTag": "RFID123456",
  "tariffPerKwh": 1.20
}
```

**Response (201 Created):**
```json
{
  "id": 42,
  "customer": {
    "id": 123,
    "name": "João Silva"
  },
  "charger": {
    "id": 1,
    "serialNumber": "CP001",
    "powerKw": 60
  },
  "ocppTransactionId": 7890,
  "startTime": "2025-01-08T10:30:00+00:00",
  "status": "Active",
  "paymentStatus": "Pending",
  "tariffPerKwh": 1.20
}
```

**Possíveis Erros:**
- `400`: Carregador não disponível
- `402`: Saldo insuficiente
- `409`: Já existe sessão ativa para este carregador

---

#### Parar Sessão

**Endpoint:** `POST /api/sessions/{id}/stop`

**Request:**
```json
{
  "reason": "UserRequested"
}
```

**Response (200 OK):**
```json
{
  "id": 42,
  "status": "Completed",
  "startTime": "2025-01-08T10:30:00+00:00",
  "endTime": "2025-01-08T11:15:00+00:00",
  "energyDeliveredKwh": 25.5,
  "durationMinutes": 45,
  "tariffPerKwh": 1.20,
  "totalCost": 30.60,
  "paymentStatus": "Paid"
}
```

---

#### Dados em Tempo Real

**Endpoint:** `GET /api/sessions/{id}/realtime`

Retorna métricas em tempo real de uma sessão ativa.

**Response (200 OK):**
```json
{
  "sessionId": 42,
  "status": "Active",
  "startTime": "2025-01-08T10:30:00+00:00",
  "elapsedMinutes": 12,
  "energyDeliveredKwh": 6.8,
  "currentPowerKw": 58.2,
  "currentA": 95.3,
  "voltageV": 401.5,
  "socPercent": 45,
  "estimatedCost": 8.16,
  "latestMeterValue": {
    "timestamp": "2025-01-08T10:42:00+00:00",
    "meterValue": 6800,
    "powerKw": 58.2
  }
}
```

---

#### Histórico de Sessões

**Endpoint:** `GET /api/sessions`

**Query Parameters:**
- `status` (string): Active, Completed, Cancelled, Faulted
- `startDate` (date): Filtrar por data inicial (ISO 8601)
- `endDate` (date): Filtrar por data final
- `customerId` (int): Filtrar por cliente (admin apenas)

**Exemplo:**
```http
GET /api/sessions?status=Completed&startDate=2025-01-01&endDate=2025-01-31
```

**Response (200 OK):**
```json
{
  "data": [
    {
      "id": 42,
      "startTime": "2025-01-08T10:30:00+00:00",
      "endTime": "2025-01-08T11:15:00+00:00",
      "energyDeliveredKwh": 25.5,
      "totalCost": 30.60,
      "status": "Completed",
      "charger": {
        "id": 1,
        "station": {
          "name": "Eletroposto Shopping Pátio Belém"
        }
      }
    }
  ],
  "pagination": { /* ... */ }
}
```

---

### Pagamentos (Payments)

#### Processar Pagamento

**Endpoint:** `POST /api/payments`

**Request (PIX):**
```json
{
  "sessionId": 42,
  "method": "pix",
  "amount": 30.60
}
```

**Response (201 Created):**
```json
{
  "paymentId": "pay_abc123",
  "status": "pending",
  "method": "pix",
  "amount": 30.60,
  "pixQrCode": "00020126580014br.gov.bcb.pix...",
  "pixQrCodeBase64": "data:image/png;base64,iVBORw0KG...",
  "expiresAt": "2025-01-08T11:30:00+00:00"
}
```

**Request (Cartão de Crédito):**
```json
{
  "sessionId": 42,
  "method": "credit_card",
  "amount": 30.60,
  "cardToken": "tok_visa1234",
  "installments": 1
}
```

**Response (201 Created):**
```json
{
  "paymentId": "pay_xyz789",
  "status": "approved",
  "method": "credit_card",
  "amount": 30.60,
  "installments": 1,
  "receipt": "https://api.eletroposto.com.br/receipts/pay_xyz789.pdf"
}
```

---

#### Comprar Créditos

**Endpoint:** `POST /api/credits/purchase`

**Request:**
```json
{
  "amount": 100.00,
  "method": "pix"
}
```

**Response (201 Created):**
```json
{
  "transactionId": "txn_abc123",
  "amount": 100.00,
  "bonus": 10.00,
  "totalCredits": 110.00,
  "paymentMethod": "pix",
  "pixQrCode": "00020126580014br.gov.bcb.pix...",
  "status": "pending"
}
```

---

#### Consultar Saldo

**Endpoint:** `GET /api/wallet`

**Response (200 OK):**
```json
{
  "customerId": 123,
  "balance": 45.80,
  "currency": "BRL",
  "lastTransaction": {
    "date": "2025-01-08T10:30:00+00:00",
    "type": "debit",
    "amount": 30.60,
    "description": "Sessão #42"
  }
}
```

---

### Veículos (Vehicles)

#### Listar Meus Veículos

**Endpoint:** `GET /api/vehicles`

**Response (200 OK):**
```json
{
  "data": [
    {
      "id": 5,
      "brand": "BYD",
      "model": "Dolphin",
      "year": 2024,
      "licensePlate": "ABC1D23",
      "connectorType": "CCS2",
      "batteryCapacityKwh": 44,
      "maxChargingPowerKw": 60,
      "isPrimary": true,
      "rfidTag": "RFID123456"
    }
  ]
}
```

---

#### Cadastrar Veículo

**Endpoint:** `POST /api/vehicles`

**Request:**
```json
{
  "brand": "BYD",
  "model": "Dolphin",
  "year": 2024,
  "licensePlate": "ABC1D23",
  "connectorType": "CCS2",
  "batteryCapacityKwh": 44,
  "maxChargingPowerKw": 60,
  "isPrimary": true
}
```

**Response (201 Created):**
```json
{
  "id": 5,
  "brand": "BYD",
  "model": "Dolphin",
  "year": 2024,
  "licensePlate": "ABC1D23",
  "connectorType": "CCS2",
  "batteryCapacityKwh": 44,
  "maxChargingPowerKw": 60,
  "isPrimary": true,
  "createdAt": "2025-01-08T10:00:00+00:00"
}
```

---

### Analytics (Estatísticas)

#### Dashboard Geral

**Endpoint:** `GET /api/analytics/dashboard`

**Query Parameters:**
- `startDate` (date): Data inicial
- `endDate` (date): Data final
- `period` (string): today, week, month, year

**Response (200 OK):**
```json
{
  "period": {
    "start": "2025-01-01T00:00:00+00:00",
    "end": "2025-01-31T23:59:59+00:00"
  },
  "sessions": {
    "total": 450,
    "completed": 420,
    "active": 5,
    "cancelled": 25
  },
  "energy": {
    "totalKwh": 5400.5,
    "averagePerSession": 12.9
  },
  "revenue": {
    "total": 6480.60,
    "paid": 6200.00,
    "pending": 280.60
  },
  "chargers": {
    "total": 3,
    "online": 3,
    "offline": 0,
    "utilizationRate": 67.5
  }
}
```

---

## 🔔 Webhooks

Configure webhooks para receber notificações em tempo real de eventos importantes.

### Configurar Webhook

**Endpoint:** `POST /api/webhooks`

**Request:**
```json
{
  "url": "https://seu-servidor.com/webhook",
  "events": [
    "session.started",
    "session.completed",
    "payment.approved",
    "payment.failed"
  ],
  "secret": "whsec_abc123"
}
```

### Eventos Disponíveis

| Evento | Descrição |
|--------|-----------|
| `session.started` | Sessão de carregamento iniciada |
| `session.completed` | Sessão finalizada |
| `session.cancelled` | Sessão cancelada |
| `payment.approved` | Pagamento aprovado |
| `payment.failed` | Pagamento falhou |
| `charger.offline` | Carregador ficou offline |
| `charger.faulted` | Carregador com falha |

### Payload do Webhook

```json
{
  "event": "session.completed",
  "timestamp": "2025-01-08T11:15:00+00:00",
  "data": {
    "sessionId": 42,
    "customerId": 123,
    "chargerId": 1,
    "energyDeliveredKwh": 25.5,
    "totalCost": 30.60,
    "paymentStatus": "paid"
  }
}
```

### Verificar Assinatura

Valide a autenticidade do webhook usando HMAC SHA-256:

```php
$signature = $_SERVER['HTTP_X_WEBHOOK_SIGNATURE'];
$payload = file_get_contents('php://input');
$expectedSignature = hash_hmac('sha256', $payload, 'whsec_abc123');

if (hash_equals($signature, $expectedSignature)) {
    // Webhook válido
}
```

---

## ❌ Erros

### Formato de Erro Padrão

```json
{
  "error": {
    "code": "validation_error",
    "message": "Os dados fornecidos são inválidos",
    "details": [
      {
        "field": "email",
        "message": "O email é obrigatório"
      },
      {
        "field": "password",
        "message": "A senha deve ter no mínimo 8 caracteres"
      }
    ]
  }
}
```

### Códigos de Erro Comuns

| Código | Significado |
|--------|-------------|
| `invalid_request` | Requisição mal formada |
| `authentication_required` | Token não fornecido |
| `invalid_token` | Token inválido ou expirado |
| `insufficient_permissions` | Sem permissão para acessar |
| `resource_not_found` | Recurso não encontrado |
| `validation_error` | Erro de validação |
| `charger_unavailable` | Carregador não disponível |
| `insufficient_balance` | Saldo insuficiente |
| `rate_limit_exceeded` | Limite de requisições excedido |

---

## 💻 Exemplos de Integração

### JavaScript (Fetch API)

```javascript
// Login
const login = async () => {
  const response = await fetch('https://api.eletroposto.com.br/api/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      email: 'cliente@example.com',
      password: 'senha123'
    })
  });

  const data = await response.json();
  localStorage.setItem('token', data.token);
  return data.token;
};

// Listar estações próximas
const getNearbyStations = async (lat, lng) => {
  const token = localStorage.getItem('token');
  const response = await fetch(
    `https://api.eletroposto.com.br/api/stations/nearby?latitude=${lat}&longitude=${lng}&radius=5`,
    {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    }
  );

  return await response.json();
};

// Iniciar sessão
const startSession = async (chargerId) => {
  const token = localStorage.getItem('token');
  const response = await fetch('https://api.eletroposto.com.br/api/sessions', {
    method: 'POST',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      chargerId: chargerId,
      vehicleId: 5
    })
  });

  return await response.json();
};
```

---

### Python (Requests)

```python
import requests

BASE_URL = 'https://api.eletroposto.com.br/api'

class EletropostoAPI:
    def __init__(self):
        self.token = None

    def login(self, email, password):
        response = requests.post(f'{BASE_URL}/login', json={
            'email': email,
            'password': password
        })
        data = response.json()
        self.token = data['token']
        return data

    def get_stations(self, city=None):
        headers = {'Authorization': f'Bearer {self.token}'}
        params = {'city': city} if city else {}
        response = requests.get(f'{BASE_URL}/stations',
                              headers=headers,
                              params=params)
        return response.json()

    def start_session(self, charger_id, vehicle_id):
        headers = {
            'Authorization': f'Bearer {self.token}',
            'Content-Type': 'application/json'
        }
        response = requests.post(f'{BASE_URL}/sessions',
                               headers=headers,
                               json={
                                   'chargerId': charger_id,
                                   'vehicleId': vehicle_id
                               })
        return response.json()

# Uso
api = EletropostoAPI()
api.login('cliente@example.com', 'senha123')
stations = api.get_stations(city='Belém')
```

---

### PHP (Guzzle)

```php
<?php

use GuzzleHttp\Client;

class EletropostoAPI
{
    private $client;
    private $token;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.eletroposto.com.br/api/',
            'timeout' => 30,
        ]);
    }

    public function login(string $email, string $password): array
    {
        $response = $this->client->post('login', [
            'json' => [
                'email' => $email,
                'password' => $password,
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $this->token = $data['token'];

        return $data;
    }

    public function getStations(string $city = null): array
    {
        $options = [
            'headers' => [
                'Authorization' => "Bearer {$this->token}"
            ]
        ];

        if ($city) {
            $options['query'] = ['city' => $city];
        }

        $response = $this->client->get('stations', $options);
        return json_decode($response->getBody(), true);
    }
}

// Uso
$api = new EletropostoAPI();
$api->login('cliente@example.com', 'senha123');
$stations = $api->getStations('Belém');
```

---

## 📞 Suporte

- **Documentação:** https://docs.eletroposto.com.br
- **Email:** api@eletroposto.com.br
- **Slack Community:** https://eletroposto.slack.com
- **Status da API:** https://status.eletroposto.com.br

---

**Última atualização:** Janeiro 2025
**Versão da Documentação:** 1.0
