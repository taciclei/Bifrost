# 🧪 Plano de Testes - Eletroposto

**Versão:** 1.0
**Data:** Janeiro 2025
**Cobertura Mínima:** 80%

---

## 📑 Índice

1. [Estratégia de Testes](#estratégia-de-testes)
2. [Tipos de Testes](#tipos-de-testes)
3. [Ambiente de Testes](#ambiente-de-testes)
4. [Casos de Teste](#casos-de-teste)
5. [Testes de Performance](#testes-de-performance)
6. [Testes de Segurança](#testes-de-segurança)
7. [Automação](#automação)
8. [Relatórios](#relatórios)

---

## 🎯 Estratégia de Testes

### Pirâmide de Testes

```
        /\
       /  \      E2E (10%)
      /____\
     /      \    Integration (30%)
    /________\
   /          \  Unit (60%)
  /__________  \
```

### Objetivos

- ✅ **Cobertura mínima:** 80% do código
- ✅ **Automação:** 90% dos testes automatizados
- ✅ **Tempo de execução:** < 10 minutos (suite completa)
- ✅ **Confiabilidade:** < 1% de testes flaky
- ✅ **CI/CD:** Todos os testes passam antes de merge

### Metodologia

- **TDD (Test-Driven Development)** para funcionalidades críticas
- **BDD (Behavior-Driven Development)** para features de usuário
- **Shift-left:** Testes o mais cedo possível no ciclo
- **Continuous Testing:** Testes executam a cada commit

---

## 🧪 Tipos de Testes

### 1. Testes Unitários (60%)

**Objetivo:** Testar funções/métodos isoladamente

**Ferramentas:**
- PHPUnit 10.5+
- Mockery para mocks
- Faker para dados fake

**Exemplo:**

```php
<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Charging;

use App\Service\Charging\TariffCalculator;
use PHPUnit\Framework\TestCase;

class TariffCalculatorTest extends TestCase
{
    private TariffCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new TariffCalculator();
    }

    public function testCalculateBasicTariff(): void
    {
        // Arrange
        $energyKwh = 10;
        $tariffPerKwh = 1.50;

        // Act
        $result = $this->calculator->calculate($energyKwh, $tariffPerKwh);

        // Assert
        $this->assertEquals(15.00, $result);
    }

    public function testCalculateWithZeroEnergy(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->calculate(0, 1.50);
    }

    /**
     * @dataProvider tariffDataProvider
     */
    public function testCalculateWithVariousTariffs(
        int $energy,
        float $tariff,
        float $expected
    ): void {
        $result = $this->calculator->calculate($energy, $tariff);
        $this->assertEquals($expected, $result);
    }

    public function tariffDataProvider(): array
    {
        return [
            'basic' => [10, 1.00, 10.00],
            'decimal energy' => [15, 1.50, 22.50],
            'high tariff' => [20, 2.00, 40.00],
        ];
    }
}
```

**O Que Testar:**
- ✅ Cálculos e lógica de negócio
- ✅ Validações de input
- ✅ Edge cases (valores zero, negativos, limites)
- ✅ Exceções esperadas
- ✅ Retornos de métodos

**Executar:**
```bash
make test-unit
# ou
php bin/phpunit --testsuite=unit
```

---

### 2. Testes de Integração (30%)

**Objetivo:** Testar integração entre componentes

**Ferramentas:**
- Symfony WebTestCase
- Doctrine Test Bundle
- Database fixtures

**Exemplo:**

```php
<?php

declare(strict_types=1);

namespace App\Tests\Integration\Repository;

use App\Entity\Charging\Station;
use App\Repository\Charging\StationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class StationRepositoryTest extends KernelTestCase
{
    private StationRepository $repository;
    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->repository = self::getContainer()->get(StationRepository::class);
        $this->entityManager = self::getContainer()->get('doctrine.orm.entity_manager');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
    }

    public function testFindNearbyStations(): void
    {
        // Arrange: Create test stations
        $station1 = new Station();
        $station1->setName('Station Near');
        $station1->setLatitude('-1.4558');
        $station1->setLongitude('-48.4902');
        $station1->setAddress('Test Address');
        $station1->setCity('Belém');
        $station1->setState('PA');
        $station1->setZipCode('66000-000');
        $station1->setStatus('Online');

        $station2 = new Station();
        $station2->setName('Station Far');
        $station2->setLatitude('-1.5000');
        $station2->setLongitude('-48.5000');
        $station2->setAddress('Test Address 2');
        $station2->setCity('Belém');
        $station2->setState('PA');
        $station2->setZipCode('66000-001');
        $station2->setStatus('Online');

        $this->entityManager->persist($station1);
        $this->entityManager->persist($station2);
        $this->entityManager->flush();

        // Act
        $nearbyStations = $this->repository->findNearby(-1.4558, -48.4902, 1);

        // Assert
        $this->assertCount(1, $nearbyStations);
        $this->assertEquals('Station Near', $nearbyStations[0]->getName());
    }

    public function testFindWithAvailableChargers(): void
    {
        // Arrange
        $station = new Station();
        $station->setName('Station with Chargers');
        // ... set other required fields

        $charger = new Charger();
        $charger->setStation($station);
        $charger->setStatus('Available');
        $charger->setIsEnabled(true);
        // ... set other required fields

        $this->entityManager->persist($station);
        $this->entityManager->persist($charger);
        $this->entityManager->flush();

        // Act
        $stations = $this->repository->findWithAvailableChargers();

        // Assert
        $this->assertGreaterThan(0, count($stations));
    }
}
```

**O Que Testar:**
- ✅ Queries do Repository
- ✅ Relacionamentos entre entidades
- ✅ Transações de banco de dados
- ✅ Event listeners/subscribers
- ✅ Serviços com dependências

**Executar:**
```bash
make test-integration
# ou
php bin/phpunit --testsuite=integration
```

---

### 3. Testes Funcionais / API (10%)

**Objetivo:** Testar endpoints da API

**Ferramentas:**
- Symfony WebTestCase
- API Platform Test Client

**Exemplo:**

```php
<?php

declare(strict_types=1);

namespace App\Tests\Functional\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class StationApiTest extends ApiTestCase
{
    private string $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->token = $this->getAuthToken();
    }

    public function testGetStationsReturnsJsonResponse(): void
    {
        $response = static::createClient()->request('GET', '/api/stations', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        $data = $response->toArray();
        $this->assertArrayHasKey('hydra:member', $data);
        $this->assertArrayHasKey('hydra:totalItems', $data);
    }

    public function testGetStationReturnsStation(): void
    {
        $response = static::createClient()->request('GET', '/api/stations/1', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertJsonContains([
            '@context' => '/api/contexts/Station',
            '@type' => 'Station',
            'id' => 1,
        ]);
    }

    public function testCreateStationRequiresAdmin(): void
    {
        static::createClient()->request('POST', '/api/stations', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/ld+json',
            ],
            'json' => [
                'name' => 'New Station',
                'latitude' => -1.4558,
                'longitude' => -48.4902,
                // ... outros campos
            ],
        ]);

        $this->assertResponseStatusCodeSame(403); // Forbidden (usuário comum)
    }

    public function testGetStationsNearby(): void
    {
        $response = static::createClient()->request(
            'GET',
            '/api/stations/nearby?latitude=-1.4558&longitude=-48.4902&radius=10',
            ['headers' => ['Authorization' => 'Bearer ' . $this->token]]
        );

        $this->assertResponseIsSuccessful();

        $data = $response->toArray();
        $this->assertArrayHasKey('data', $data);

        // Verificar que estações retornadas estão dentro do raio
        foreach ($data['data'] as $station) {
            $this->assertLessThan(10, $station['distance']);
        }
    }

    private function getAuthToken(): string
    {
        $response = static::createClient()->request('POST', '/api/login', [
            'json' => [
                'email' => 'test@example.com',
                'password' => 'test123',
            ],
        ]);

        return $response->toArray()['token'];
    }
}
```

**O Que Testar:**
- ✅ Status codes corretos (200, 201, 400, 401, 404)
- ✅ Headers corretos (Content-Type, CORS)
- ✅ Autenticação e autorização
- ✅ Validação de inputs
- ✅ Formato de resposta JSON
- ✅ Paginação
- ✅ Filtros e ordenação

**Executar:**
```bash
php bin/phpunit --testsuite=functional
```

---

### 4. Testes End-to-End (E2E)

**Objetivo:** Testar fluxos completos de usuário

**Ferramentas:**
- Playwright ou Cypress
- Selenium (legacy)

**Exemplo (Playwright):**

```javascript
// tests/e2e/charging-session.spec.js
import { test, expect } from '@playwright/test';

test.describe('Charging Session Flow', () => {
  test('User can start and complete charging session', async ({ page }) => {
    // Login
    await page.goto('https://localhost/login');
    await page.fill('input[name="email"]', 'test@example.com');
    await page.fill('input[name="password"]', 'test123');
    await page.click('button[type="submit"]');

    await expect(page).toHaveURL('https://localhost/dashboard');

    // Navigate to map
    await page.click('a[href="/map"]');

    // Select a station
    await page.click('.station-marker[data-id="1"]');
    await expect(page.locator('.station-details')).toBeVisible();

    // Select available charger
    await page.click('.charger-card[data-status="Available"]');

    // Start session
    await page.click('button:has-text("Iniciar Carregamento")');

    // Confirm
    await page.click('button:has-text("Confirmar")');

    // Verify session started
    await expect(page.locator('.session-status')).toHaveText('Ativa');
    await expect(page.locator('.energy-delivered')).toBeVisible();

    // Wait for some energy to be delivered
    await page.waitForTimeout(5000);

    // Stop session
    await page.click('button:has-text("Parar Carregamento")');

    // Verify redirect to payment
    await expect(page).toHaveURL(/.*\/payment/);

    // Complete payment (PIX)
    await page.click('button[data-method="pix"]');
    await expect(page.locator('.pix-qrcode')).toBeVisible();

    // Simulate webhook (payment approved)
    // ...

    // Verify receipt
    await expect(page.locator('.receipt')).toBeVisible();
  });

  test('User cannot start session with insufficient balance', async ({ page }) => {
    // Login with user that has zero balance
    await page.goto('https://localhost/login');
    await page.fill('input[name="email"]', 'broke@example.com');
    await page.fill('input[name="password"]', 'test123');
    await page.click('button[type="submit"]');

    // Try to start session
    await page.goto('https://localhost/map');
    await page.click('.station-marker[data-id="1"]');
    await page.click('.charger-card[data-status="Available"]');
    await page.click('button:has-text("Iniciar Carregamento")');

    // Should show error
    await expect(page.locator('.error-message'))
      .toHaveText(/saldo insuficiente/i);
  });
});
```

**Executar:**
```bash
npx playwright test
# ou
npm run test:e2e
```

---

## 🔬 Casos de Teste Críticos

### CT01 - Sessão de Carregamento

| ID | Descrição | Pré-condição | Passos | Resultado Esperado |
|----|-----------|--------------|--------|-------------------|
| **CT01-01** | Iniciar sessão com sucesso | Usuário autenticado, saldo > R$ 50 | 1. Selecionar carregador disponível<br>2. Clicar "Iniciar"<br>3. Confirmar | Session criada, status "Active", carregador "Occupied" |
| **CT01-02** | Rejeitar sessão sem saldo | Usuário autenticado, saldo = R$ 0 | 1. Tentar iniciar sessão | Erro: "Saldo insuficiente" |
| **CT01-03** | Parar sessão manualmente | Sessão ativa | 1. Clicar "Parar"<br>2. Confirmar | Session status "Completed", custo calculado |
| **CT01-04** | Sessão cancela após timeout | Sessão iniciada, sem energia entregue por 15min | Aguardar 15 minutos | Session status "Cancelled", sem cobrança |
| **CT01-05** | Múltiplas sessões simultâneas | 2 usuários diferentes | Ambos iniciam no mesmo carregador | Segundo usuário recebe erro "Carregador ocupado" |

---

### CT02 - OCPP WebSocket

| ID | Descrição | Pré-condição | Passos | Resultado Esperado |
|----|-----------|--------------|--------|-------------------|
| **CT02-01** | BootNotification aceito | Carregador novo | Enviar BootNotification | Resposta "Accepted", intervalo 300s |
| **CT02-02** | Heartbeat mantém conexão | Carregador conectado | Enviar Heartbeat | Resposta com timestamp atual |
| **CT02-03** | StartTransaction | Sessão autorizada no backend | Enviar StartTransaction | Resposta com transactionId |
| **CT02-04** | MeterValues recebidos | Transação ativa | Enviar MeterValues a cada 60s | Valores persistidos no BD |
| **CT02-05** | StopTransaction | Transação ativa | Enviar StopTransaction | Resposta OK, session "Completed" |
| **CT02-06** | Reconexão após queda | Carregador desconectado | Reconectar WebSocket | Aceito, sessões restauradas |

---

### CT03 - Pagamentos

| ID | Descrição | Pré-condição | Passos | Resultado Esperado |
|----|-----------|--------------|--------|-------------------|
| **CT03-01** | Pagamento PIX aprovado | Session completed, valor R$ 30 | 1. Gerar QR Code PIX<br>2. Simular webhook aprovado | Payment status "Approved", recibo enviado |
| **CT03-02** | Pagamento cartão | Session completed | 1. Informar dados cartão<br>2. Processar | Payment status "Approved" |
| **CT03-03** | Compra de créditos | Usuário autenticado | 1. Comprar R$ 100 de créditos<br>2. Pagar com PIX | Saldo atualizado + R$ 100 |
| **CT03-04** | Pagamento falha | Session completed | Webhook de falha | Payment status "Failed", retry automático |
| **CT03-05** | Plano mensal | Gestor de frota | Assinar plano R$ 499/mês | Cobrança recorrente, carregamentos ilimitados |

---

### CT04 - Autenticação e Segurança

| ID | Descrição | Pré-condição | Passos | Resultado Esperado |
|----|-----------|--------------|--------|-------------------|
| **CT04-01** | Login com sucesso | Usuário cadastrado | Email + senha corretos | JWT token retornado, expira em 1h |
| **CT04-02** | Login com senha errada | Usuário cadastrado | Senha incorreta | Erro 401 "Credenciais inválidas" |
| **CT04-03** | Rate limiting login | Nenhuma | 6 tentativas em 1min | 6ª tentativa bloqueada (429) |
| **CT04-04** | Token expirado | Token com 2h | Usar token | Erro 401 "Token expirado" |
| **CT04-05** | Refresh token | Token expirado | Usar refresh_token | Novo access_token gerado |
| **CT04-06** | Acesso sem autenticação | Nenhuma | GET /api/sessions sem token | Erro 401 |
| **CT04-07** | Acesso a recurso de outro usuário | Usuário A autenticado | GET /api/sessions/{id_usuario_B} | Erro 403 Forbidden |

---

## ⚡ Testes de Performance

### Ferramentas
- **Apache JMeter** - Load testing
- **k6** - Modern load testing
- **Locust** - Python-based load testing

### Cenários de Teste

#### Teste 1: Carga Normal

```javascript
// k6-load-test.js
import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
  stages: [
    { duration: '2m', target: 100 }, // Ramp-up to 100 users
    { duration: '5m', target: 100 }, // Stay at 100 users
    { duration: '2m', target: 0 },   // Ramp-down to 0
  ],
  thresholds: {
    http_req_duration: ['p(95)<500'], // 95% of requests must complete below 500ms
    http_req_failed: ['rate<0.01'],   // Error rate must be below 1%
  },
};

export default function () {
  // Login
  const loginRes = http.post('https://api.eletroposto.com.br/api/login', {
    email: 'test@example.com',
    password: 'test123',
  });

  check(loginRes, {
    'login successful': (r) => r.status === 200,
  });

  const token = loginRes.json('token');

  // Get stations
  const stationsRes = http.get('https://api.eletroposto.com.br/api/stations', {
    headers: { Authorization: `Bearer ${token}` },
  });

  check(stationsRes, {
    'stations loaded': (r) => r.status === 200,
    'response time OK': (r) => r.timings.duration < 500,
  });

  sleep(1);
}
```

**Executar:**
```bash
k6 run k6-load-test.js
```

**Métricas Alvo:**
- Latência p95: < 500ms
- Latência p99: < 1000ms
- Taxa de erro: < 1%
- Throughput: 100 req/s

---

#### Teste 2: Stress Test (Pico)

```javascript
export const options = {
  stages: [
    { duration: '2m', target: 500 },  // Ramp-up to 500 users
    { duration: '5m', target: 500 },  // Stress
    { duration: '2m', target: 0 },
  ],
};
```

**Objetivo:** Encontrar limite de capacidade

---

#### Teste 3: Spike Test (COP30)

```javascript
export const options = {
  stages: [
    { duration: '10s', target: 1000 }, // Spike súbito
    { duration: '1m', target: 1000 },
    { duration: '10s', target: 0 },
  ],
};
```

**Objetivo:** Verificar comportamento em picos súbitos

---

## 🔐 Testes de Segurança

### Ferramentas
- **OWASP ZAP** - Vulnerability scanner
- **Burp Suite** - Web security testing
- **Snyk** - Dependency scanning

### Checklist de Segurança

#### Autenticação
- [ ] Senha deve ter mínimo 8 caracteres
- [ ] Rate limiting em /login (máx 5 tentativas/15min)
- [ ] Tokens JWT expiram em 1 hora
- [ ] Refresh tokens podem ser revogados
- [ ] Logout invalida token

#### Autorização
- [ ] Usuário só acessa próprios recursos
- [ ] Admin pode acessar todos recursos
- [ ] Operador tem permissões limitadas
- [ ] CORS configurado corretamente

#### SQL Injection
- [ ] Todos queries usam prepared statements
- [ ] ORM (Doctrine) usado para queries
- [ ] Nenhum input diretamente em SQL

#### XSS (Cross-Site Scripting)
- [ ] Outputs escapados no frontend
- [ ] Content Security Policy configurado
- [ ] Headers de segurança presentes

#### CSRF
- [ ] Tokens CSRF em formulários
- [ ] SameSite cookie configurado

#### Dados Sensíveis
- [ ] Senhas com hash (Argon2)
- [ ] Dados pessoais criptografados (AES-256)
- [ ] Logs não contêm dados sensíveis
- [ ] HTTPS obrigatório em produção

### Scan Automatizado

```bash
# OWASP ZAP scan
docker run -t owasp/zap2docker-stable zap-baseline.py \
  -t https://staging.eletroposto.com.br \
  -r zap-report.html

# Snyk - vulnerabilidades em dependências
snyk test

# Composer audit
composer audit
```

---

## 🤖 Automação de Testes

### CI/CD Pipeline (GitHub Actions)

```yaml
# .github/workflows/tests.yml
name: Tests

on: [push, pull_request]

jobs:
  unit-tests:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'
          extensions: pdo, pdo_pgsql, redis

      - name: Install dependencies
        run: composer install --prefer-dist

      - name: Run unit tests
        run: php bin/phpunit --testsuite=unit --coverage-clover coverage.xml

      - name: Upload coverage
        uses: codecov/codecov-action@v3
        with:
          file: ./coverage.xml

  integration-tests:
    runs-on: ubuntu-latest
    services:
      postgres:
        image: postgres:15
        env:
          POSTGRES_DB: eletroposto_test
          POSTGRES_USER: sylius
          POSTGRES_PASSWORD: test
        options: >-
          --health-cmd pg_isready
          --health-interval 10s
          --health-timeout 5s
          --health-retries 5

    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'

      - name: Install dependencies
        run: composer install

      - name: Run migrations
        run: php bin/console doctrine:migrations:migrate --no-interaction --env=test

      - name: Run integration tests
        run: php bin/phpunit --testsuite=integration

  static-analysis:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'

      - name: Install dependencies
        run: composer install

      - name: PHPStan
        run: vendor/bin/phpstan analyse --level=8

      - name: PHP CS Fixer
        run: vendor/bin/php-cs-fixer fix --dry-run --diff
```

---

## 📊 Relatórios de Testes

### Métricas Acompanhadas

| Métrica | Meta | Atual | Status |
|---------|------|-------|--------|
| **Cobertura de Código** | 80% | - | 🟡 |
| **Testes Passando** | 100% | - | 🟡 |
| **Tempo de Execução** | < 10min | - | 🟡 |
| **Flaky Tests** | < 1% | - | 🟡 |
| **Bugs em Produção** | < 2/mês | - | 🟡 |

### Dashboard

- **CodeCov:** https://codecov.io/gh/eletroposto
- **SonarQube:** Análise de qualidade
- **Grafana:** Métricas de testes em CI/CD

---

## ✅ Checklist de QA

### Antes de Merge para Main

- [ ] Todos os testes unitários passam
- [ ] Todos os testes de integração passam
- [ ] Cobertura >= 80%
- [ ] PHPStan level 8 sem erros
- [ ] PHP CS Fixer sem warnings
- [ ] Code review aprovado por 1+ pessoa
- [ ] Documentação atualizada
- [ ] Changelog atualizado

### Antes de Deploy em Staging

- [ ] Testes funcionais passam
- [ ] Smoke tests passam
- [ ] Performance tests dentro dos limites
- [ ] Security scan sem vulnerabilidades críticas

### Antes de Deploy em Produção

- [ ] Aprovação do Product Owner
- [ ] Testado em staging por 24h+
- [ ] Backup da base de dados
- [ ] Rollback plan documentado
- [ ] Monitoramento configurado

---

**Responsável:** QA Lead
**Revisão:** Mensal
**Última atualização:** Janeiro 2025
