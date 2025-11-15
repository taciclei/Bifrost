# 🤝 Guia de Contribuição - Projeto Eletroposto

Obrigado por considerar contribuir com o projeto Eletroposto! Este documento contém diretrizes para garantir que o código seja consistente, de alta qualidade e fácil de manter.

---

## 📑 Índice

1. [Código de Conduta](#código-de-conduta)
2. [Como Começar](#como-começar)
3. [Fluxo de Trabalho Git](#fluxo-de-trabalho-git)
4. [Padrões de Código](#padrões-de-código)
5. [Estrutura de Commits](#estrutura-de-commits)
6. [Pull Requests](#pull-requests)
7. [Testes](#testes)
8. [Documentação](#documentação)
9. [Revisão de Código](#revisão-de-código)

---

## 📜 Código de Conduta

### Nossos Valores

- ✅ **Respeito:** Trate todos com respeito e profissionalismo
- ✅ **Colaboração:** Trabalhe em equipe e compartilhe conhecimento
- ✅ **Qualidade:** Código limpo, testado e documentado
- ✅ **Transparência:** Comunicação clara e aberta
- ✅ **Sustentabilidade:** Pense no futuro do projeto

### Comportamentos Inaceitáveis

- ❌ Linguagem ofensiva ou discriminatória
- ❌ Assédio de qualquer tipo
- ❌ Spam ou propaganda não relacionada
- ❌ Compartilhamento de informações privadas sem consentimento

---

## 🚀 Como Começar

### 1. Configurar Ambiente Local

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/eletroposto.git
cd eletroposto

# Instale o projeto
make install

# Verifique se tudo está funcionando
make test
```

### 2. Criar Branch para sua Feature

```bash
# Sempre crie a partir da branch main atualizada
git checkout main
git pull origin main

# Crie uma nova branch
git checkout -b feature/minha-nova-feature
```

### 3. Fazer suas Alterações

- Siga os [Padrões de Código](#padrões-de-código)
- Escreva testes
- Documente o código
- Execute testes localmente

### 4. Submeter Pull Request

- Commit suas alterações
- Push para o repositório
- Abra um Pull Request

---

## 🌳 Fluxo de Trabalho Git

### Branches

Utilizamos **Git Flow** simplificado:

```
main (produção)
  ├── develop (desenvolvimento)
  │   ├── feature/nova-funcionalidade
  │   ├── feature/outra-feature
  │   ├── bugfix/corrigir-bug
  │   └── hotfix/correcao-urgente
```

#### Tipos de Branches

| Tipo | Prefixo | Exemplo | Descrição |
|------|---------|---------|-----------|
| **Feature** | `feature/` | `feature/ocpp-websocket` | Nova funcionalidade |
| **Bugfix** | `bugfix/` | `bugfix/session-timeout` | Correção de bug |
| **Hotfix** | `hotfix/` | `hotfix/security-patch` | Correção urgente em produção |
| **Release** | `release/` | `release/1.0.0` | Preparação para release |
| **Chore** | `chore/` | `chore/update-deps` | Manutenção (deps, configs) |
| **Docs** | `docs/` | `docs/api-documentation` | Apenas documentação |

### Nomenclatura de Branches

**Bom:**
```bash
feature/ocpp-heartbeat-implementation
bugfix/payment-webhook-timeout
hotfix/critical-sql-injection
```

**Ruim:**
```bash
feature/nova-coisa
fix-bug
minha-branch
```

---

## 💻 Padrões de Código

### PHP

#### PSR-12 Compliance

Utilizamos **PSR-12** como padrão de código PHP:

```php
<?php

declare(strict_types=1);

namespace App\Service\Charging;

use App\Entity\Charging\ChargingSession;
use Doctrine\ORM\EntityManagerInterface;

class ChargingSessionManager
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private TariffCalculator $tariffCalculator
    ) {
    }

    public function startSession(int $chargerId, int $customerId): ChargingSession
    {
        // Implementação
    }
}
```

**Regras Importantes:**
- ✅ Declare strict types: `declare(strict_types=1);`
- ✅ Use type hints em tudo (parâmetros e retornos)
- ✅ Propriedades promoted (PHP 8+)
- ✅ Named arguments quando apropriado
- ✅ 4 espaços para indentação
- ✅ Linha máxima de 120 caracteres

#### PHP CS Fixer

```bash
# Verificar code style
make cs-check

# Corrigir automaticamente
make cs-fix
```

Configuração (`.php-cs-fixer.php`):
```php
<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'native_function_invocation' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ])
    ->setFinder($finder);
```

#### PHPStan (Análise Estática)

Utilizamos **level 8** (máximo rigor):

```bash
make phpstan
```

Exemplo de código que passa no PHPStan level 8:
```php
<?php

declare(strict_types=1);

namespace App\Service;

class TariffCalculator
{
    /**
     * @param positive-int $energyKwh
     * @param positive-float $tariffPerKwh
     * @return positive-float
     */
    public function calculate(int $energyKwh, float $tariffPerKwh): float
    {
        return $energyKwh * $tariffPerKwh;
    }
}
```

### Doctrine

#### Entidades

```php
<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[ORM\Table(name: 'charging_station')]
#[ORM\HasLifecycleCallbacks]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    private string $name;

    #[ORM\PrePersist]
    public function prePersist(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    // Getters e Setters com type hints
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
```

#### Repositories

```php
<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Station>
 */
class StationRepository extends ServiceEntityRepository
{
    /**
     * @return Station[]
     */
    public function findWithAvailableChargers(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.chargers', 'c')
            ->where('c.status = :status')
            ->setParameter('status', 'Available')
            ->getQuery()
            ->getResult();
    }
}
```

### JavaScript/TypeScript

```typescript
// interfaces/Station.ts
export interface Station {
  id: number;
  name: string;
  latitude: number;
  longitude: number;
  availableChargers: number;
}

// services/StationService.ts
export class StationService {
  async getNearbyStations(
    lat: number,
    lng: number,
    radius: number = 10
  ): Promise<Station[]> {
    const response = await fetch(
      `/api/stations/nearby?latitude=${lat}&longitude=${lng}&radius=${radius}`
    );

    if (!response.ok) {
      throw new Error('Failed to fetch stations');
    }

    return response.json();
  }
}
```

**Regras TypeScript:**
- ✅ Sempre use TypeScript (não JS puro)
- ✅ Strict mode habilitado
- ✅ Interfaces para todos os tipos
- ✅ Evite `any` - use `unknown` quando necessário
- ✅ ESLint + Prettier configurados

---

## 📝 Estrutura de Commits

Utilizamos **Conventional Commits**:

### Formato

```
<tipo>(<escopo>): <descrição curta>

<corpo opcional>

<footer opcional>
```

### Tipos de Commit

| Tipo | Descrição | Exemplo |
|------|-----------|---------|
| `feat` | Nova funcionalidade | `feat(ocpp): add heartbeat message handler` |
| `fix` | Correção de bug | `fix(payment): resolve webhook timeout` |
| `docs` | Documentação | `docs(api): update endpoints documentation` |
| `style` | Formatação (sem mudança de lógica) | `style(entity): fix indentation` |
| `refactor` | Refatoração | `refactor(session): extract tariff calculation` |
| `perf` | Melhoria de performance | `perf(query): add index to charger status` |
| `test` | Adicionar/corrigir testes | `test(session): add unit tests for calculate cost` |
| `chore` | Manutenção | `chore(deps): update symfony to 7.0.2` |
| `ci` | CI/CD | `ci(github): add automated tests workflow` |
| `build` | Build system | `build(docker): optimize PHP image layers` |

### Exemplos de Commits Bons

```bash
feat(ocpp): implement StartTransaction message handler

- Add handler for OCPP StartTransaction
- Create ChargingSession entity
- Update charger status to "Occupied"
- Send confirmation to charger

Closes #42
```

```bash
fix(payment): prevent duplicate webhook processing

The webhook handler was processing the same event multiple times
due to missing idempotency check.

- Add processed_webhooks table
- Check webhook_id before processing
- Add unique constraint on webhook_id

Fixes #128
```

```bash
docs(readme): add installation instructions for macOS

- Add Homebrew installation steps
- Document port conflicts resolution
- Add troubleshooting section
```

### Commits Ruins (Evitar)

```bash
❌ "fix bug"
❌ "update code"
❌ "changes"
❌ "wip"
❌ "asdfasdf"
```

---

## 🔀 Pull Requests

### Checklist Antes de Abrir PR

- [ ] Código segue padrões PSR-12
- [ ] PHPStan level 8 passa sem erros
- [ ] Todos os testes passam (`make test`)
- [ ] Novos testes foram adicionados
- [ ] Documentação foi atualizada
- [ ] Commits seguem Conventional Commits
- [ ] Branch está atualizado com `main`
- [ ] Não há conflitos de merge

### Template de Pull Request

```markdown
## Descrição

Breve descrição do que foi implementado/corrigido.

## Tipo de Mudança

- [ ] Nova funcionalidade (feature)
- [ ] Correção de bug (bugfix)
- [ ] Refatoração
- [ ] Documentação
- [ ] Outro (especificar)

## Motivação e Contexto

Por que essa mudança é necessária? Qual problema resolve?

Closes #(issue)

## Como Foi Testado?

Descreva os testes que você executou:

- [ ] Testes unitários
- [ ] Testes de integração
- [ ] Testes manuais

### Cenários de Teste

1. Cenário 1: Descrição
2. Cenário 2: Descrição

## Screenshots (se aplicável)

## Checklist

- [ ] Código segue padrões do projeto
- [ ] Self-review foi feito
- [ ] Comentários foram adicionados em código complexo
- [ ] Documentação foi atualizada
- [ ] Testes foram adicionados
- [ ] Todos os testes passam localmente
- [ ] Não há warnings do PHPStan
```

### Tamanho do PR

**Ideal:** 200-400 linhas de código
**Máximo aceitável:** 1000 linhas

Se seu PR tiver mais de 1000 linhas, considere dividir em PRs menores.

### Review Process

1. **Autor abre PR**
2. **CI roda automaticamente** (testes, PHPStan, CS)
3. **Pelo menos 1 aprovação** de outro desenvolvedor
4. **Merge** (squash and merge preferido)

---

## 🧪 Testes

### Tipos de Testes

#### 1. Testes Unitários

Testam uma única classe/método isoladamente:

```php
<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

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

    /**
     * @dataProvider invalidInputsProvider
     */
    public function testCalculateWithInvalidInputsThrowsException(
        int $energy,
        float $tariff
    ): void {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->calculate($energy, $tariff);
    }

    public function invalidInputsProvider(): array
    {
        return [
            'negative energy' => [-10, 1.50],
            'zero energy' => [0, 1.50],
            'negative tariff' => [10, -1.50],
        ];
    }
}
```

#### 2. Testes de Integração

Testam interação entre componentes:

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

    protected function setUp(): void
    {
        self::bootKernel();
        $this->repository = self::getContainer()
            ->get(StationRepository::class);
    }

    public function testFindNearbyStations(): void
    {
        // Arrange: Create test stations
        $station1 = new Station();
        $station1->setName('Station 1');
        $station1->setLatitude('-1.4558');
        $station1->setLongitude('-48.4902');

        $this->entityManager->persist($station1);
        $this->entityManager->flush();

        // Act
        $nearbyStations = $this->repository->findNearby(-1.4558, -48.4902, 10);

        // Assert
        $this->assertCount(1, $nearbyStations);
        $this->assertEquals('Station 1', $nearbyStations[0]->getName());
    }
}
```

#### 3. Testes de API (Functional)

```php
<?php

namespace App\Tests\Functional\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StationApiTest extends WebTestCase
{
    public function testGetStationsReturnsJsonResponse(): void
    {
        $client = static::createClient();

        // Act
        $client->request('GET', '/api/stations');

        // Assert
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');

        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('pagination', $data);
    }

    public function testGetStationRequiresAuthentication(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/stations/1');

        $this->assertResponseStatusCodeSame(401);
    }
}
```

### Executar Testes

```bash
# Todos os testes
make test

# Apenas testes unitários
make test-unit

# Testes de integração
make test-integration

# Com cobertura
make test-coverage
```

### Cobertura de Código

**Meta:** Mínimo 80% de cobertura

```bash
make test-coverage
open var/coverage/index.html
```

---

## 📚 Documentação

### Docblocks PHP

```php
<?php

/**
 * Calcula o custo total de uma sessão de carregamento.
 *
 * @param int $energyKwh Energia entregue em kWh
 * @param float $tariffPerKwh Tarifa por kWh em reais
 * @return float Custo total em reais
 *
 * @throws \InvalidArgumentException Se energia ou tarifa forem negativas
 */
public function calculate(int $energyKwh, float $tariffPerKwh): float
{
    if ($energyKwh < 0 || $tariffPerKwh < 0) {
        throw new \InvalidArgumentException('Valores não podem ser negativos');
    }

    return $energyKwh * $tariffPerKwh;
}
```

### README de Features

Cada feature importante deve ter um README:

```markdown
# Feature: OCPP WebSocket Server

## Visão Geral
Servidor WebSocket que implementa protocolo OCPP 1.6 para comunicação
com carregadores de veículos elétricos.

## Arquitetura
[Diagrama]

## Uso
```php
// Exemplo de código
```

## Configuração
- Variável X
- Variável Y

## Testes
Como testar essa feature

## Troubleshooting
Problemas comuns e soluções
```

---

## 👀 Revisão de Código

### O Que Revisar

#### Funcionalidade
- [ ] O código faz o que deveria fazer?
- [ ] Edge cases foram considerados?
- [ ] Há validação adequada de inputs?

#### Design
- [ ] Código é fácil de entender?
- [ ] Nomes são descritivos?
- [ ] Responsabilidades estão bem separadas?
- [ ] Evita duplicação (DRY)?

#### Performance
- [ ] Há queries N+1?
- [ ] Cache é usado adequadamente?
- [ ] Há índices necessários no BD?

#### Segurança
- [ ] Inputs são validados/sanitizados?
- [ ] Há proteção contra SQL injection?
- [ ] Dados sensíveis estão protegidos?
- [ ] LGPD é respeitada?

#### Testes
- [ ] Testes cobrem casos importantes?
- [ ] Testes são legíveis?
- [ ] Mocks são usados adequadamente?

### Como Dar Feedback

**Bom:**
```
💡 Sugestão: Considere usar Repository pattern aqui para separar
a lógica de acesso a dados da lógica de negócio.

```php
// Em vez de:
$stations = $entityManager->getRepository(Station::class)->findAll();

// Considere:
$stations = $this->stationRepository->findAll();
```
```

**Ruim:**
```
❌ Esse código está horrível, reescreva tudo.
```

### Como Receber Feedback

- ✅ Agradeça o revisor pelo tempo
- ✅ Faça perguntas se não entender
- ✅ Considere sugestões com mente aberta
- ✅ Não leve para o lado pessoal
- ❌ Não fique na defensiva

---

## 🎓 Recursos para Aprendizado

### PHP/Symfony
- [Symfony Best Practices](https://symfony.com/doc/current/best_practices.html)
- [PHP The Right Way](https://phptherightway.com/)
- [Doctrine Best Practices](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/best-practices.html)

### OCPP
- [OCPP 1.6 Specification](https://www.openchargealliance.org/protocols/ocpp-16/)
- [OCPP Implementation Guide](https://www.openchargealliance.org/downloads/)

### Git
- [Conventional Commits](https://www.conventionalcommits.org/)
- [Git Flow](https://nvie.com/posts/a-successful-git-branching-model/)

---

## 🆘 Precisa de Ajuda?

- **Slack:** #eletroposto-dev
- **Email:** dev@eletroposto.com.br
- **Issues:** https://github.com/eletroposto/issues

---

**Obrigado por contribuir! 🚀⚡**
