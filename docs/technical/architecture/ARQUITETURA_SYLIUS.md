# Arquitetura do Sistema com Sylius
## Plataforma de Gestão de Eletropostos - OCPP 1.6

**Versão:** 2.0 (Adaptado para Sylius)
**Data:** Janeiro 2025
**Stack Base:** Sylius/Symfony/PHP
**Status:** Planejamento

---

## 1. VISÃO GERAL DA ARQUITETURA

### 1.1 Por que Sylius?

**Sylius** é uma plataforma e-commerce headless open-source baseada em **Symfony** e **API Platform**, perfeita para nosso caso de uso:

✅ **E-commerce nativo:** Sistema de pagamentos, produtos (recargas), usuários já implementados
✅ **API-First:** REST API completo pronto para uso
✅ **Modular:** Bundles Symfony reutilizáveis e extensíveis
✅ **Escalável:** Suporta desde VPS simples até Kubernetes
✅ **Comunidade ativa:** Framework maduro com suporte
✅ **Open Source:** MIT License, sem custos de licença
✅ **PHP 8.2+:** Performance moderna com Symfony 7

### 1.2 Adaptação para Eletropostos

```
SYLIUS CORE                      CUSTOMIZAÇÕES
─────────────────                ──────────────────────────
Product Management    →          Charging Plans (kWh packages)
Order Management      →          Charging Sessions
Payment Integration   →          Já pronto (Stripe, PayPal, Pix)
Customer Management   →          EV Owners + Vehicle data
Inventory             →          Charger Availability
Promotions            →          Time-based pricing, loyalty
Admin Panel           →          Operator Dashboard
```

### 1.3 Diagrama de Alto Nível

```
┌─────────────────────────────────────────────────────────────────┐
│                      CAMADA DE APRESENTAÇÃO                      │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────┐    ┌──────────────┐    ┌──────────────┐     │
│  │   Web App    │    │  Mobile App  │    │Sylius Admin  │     │
│  │  (Twig/Vue)  │    │   (Futuro)   │    │    Panel     │     │
│  └──────────────┘    └──────────────┘    └──────────────┘     │
│         │                    │                    │             │
│         └────────────────────┴────────────────────┘             │
│                             │                                    │
│                        HTTPS/REST                               │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                    SYLIUS API PLATFORM                           │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │         API Platform (GraphQL + REST)                    │  │
│  │  - Auto-generated from Doctrine entities                 │  │
│  │  - JWT Authentication                                    │  │
│  │  - Rate Limiting                                         │  │
│  │  - OpenAPI Documentation                                 │  │
│  └──────────────────────────────────────────────────────────┘  │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                      SYMFONY BUNDLES                             │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐            │
│  │   Sylius    │  │   Custom    │  │   Custom    │            │
│  │  CoreBundle │  │ ChargingBdl │  │   OCPPBdl   │            │
│  └─────────────┘  └─────────────┘  └─────────────┘            │
│                                                                  │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────┐            │
│  │  Payment    │  │  Analytics  │  │  Notific.   │            │
│  │   Bundle    │  │   Bundle    │  │   Bundle    │            │
│  └─────────────┘  └─────────────┘  └─────────────┘            │
│                             │                                    │
├─────────────────────────────────────────────────────────────────┤
│                    CAMADA DE INTEGRAÇÃO                          │
├─────────────────────────────────────────────────────────────────┤
│                                                                  │
│  ┌──────────────────────────────────────────────────────────┐  │
│  │        OCPP 1.6 WebSocket Server (Ratchet/PHP)           │  │
│  │  - Persistent connections via Ratchet                    │  │
│  │  - OCPP message handling                                 │  │
│  │  - Integration with Doctrine ORM                         │  │
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
       │  │  PostgreSQL │      │    Redis     │     │
       │  │ (Doctrine)  │      │    Cache     │     │
       │  └─────────────┘      └──────────────┘     │
       └─────────────────────────────────────────────┘
```

---

## 2. STACK TECNOLÓGICO SYLIUS

### 2.1 Core Framework

```yaml
Plataforma Base: Sylius 1.13+ (última stable)
PHP: 8.2 ou 8.3
Framework: Symfony 7.0+ (LTS)
ORM: Doctrine ORM 3.x
API: API Platform 3.x
Template Engine: Twig (server-side) ou Vue.js (SPA)
```

**Repositório oficial:** https://github.com/Sylius/Sylius-Standard

### 2.2 Bundles Sylius Inclusos

| Bundle | Função | Uso no Projeto |
|--------|--------|----------------|
| **SyliusCoreBundle** | Core do e-commerce | Base do sistema |
| **SyliusProductBundle** | Gestão de produtos | Planos de recarga |
| **SyliusOrderBundle** | Pedidos | Sessões de recarga |
| **SyliusCustomerBundle** | Clientes | Proprietários de VE |
| **SyliusPaymentBundle** | Pagamentos | Stripe, Pix, cartões |
| **SyliusPromotionBundle** | Promoções | Descontos, horários |
| **SyliusInventoryBundle** | Estoque | Disponibilidade carregadores |
| **SyliusAdminBundle** | Painel admin | Dashboard operacional |
| **SyliusShopBundle** | Loja frontend | App do cliente |
| **SyliusApiBundle** | REST API | Mobile app |

### 2.3 Bundles Customizados

```php
// src/Bundle/ChargingBundle/
// Gerenciamento de sessões de recarga
ChargingBundle:
  - Entity/ChargingSession
  - Entity/Charger
  - Entity/Station
  - Service/ChargingManager
  - Repository/ChargingSessionRepository

// src/Bundle/OcppBundle/
// Servidor OCPP 1.6
OcppBundle:
  - WebSocket/OcppServer
  - Handler/BootNotificationHandler
  - Handler/StartTransactionHandler
  - Handler/StopTransactionHandler
  - Entity/OcppMessage
  - Service/OcppMessageValidator

// src/Bundle/AnalyticsBundle/
// Métricas e dashboards
AnalyticsBundle:
  - Service/KpiCalculator
  - Controller/DashboardController
  - Repository/AnalyticsRepository
```

### 2.4 Dependências Principais

```json
{
  "require": {
    "php": "^8.2",
    "sylius/sylius": "^1.13",
    "symfony/framework-bundle": "^7.0",
    "doctrine/orm": "^3.0",
    "api-platform/core": "^3.2",
    "lexik/jwt-authentication-bundle": "^2.20",
    "cboden/ratchet": "^0.4",
    "ramsey/uuid-doctrine": "^2.0",
    "predis/predis": "^2.2",
    "stripe/stripe-php": "^13.0",
    "phpoffice/phpspreadsheet": "^1.29",
    "symfony/mercure-bundle": "^0.3"
  },
  "require-dev": {
    "symfony/maker-bundle": "^1.52",
    "phpunit/phpunit": "^10.5",
    "behat/behat": "^3.13",
    "phpstan/phpstan": "^1.10"
  }
}
```

**Dependências chave:**
- **cboden/ratchet:** WebSocket server para OCPP
- **lexik/jwt-authentication-bundle:** Autenticação JWT
- **symfony/mercure-bundle:** Real-time updates (alternativa ao WebSocket)

---

## 3. ARQUITETURA DOCTRINE/SYLIUS

### 3.1 Modelo de Domínio

#### Entidades Base do Sylius (Reutilizadas)

```php
// Sylius já fornece:

namespace Sylius\Component\Core\Model;

class Customer // Proprietário de VE
{
    private ?int $id;
    private ?string $email;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $phoneNumber;
    // ... campos Sylius padrão
}

class Order // Usado para sessões de recarga
{
    private ?int $id;
    private ?Customer $customer;
    private Collection $items; // OrderItems
    private ?int $total;
    private ?string $state;
    private ?\DateTimeInterface $checkoutCompletedAt;
    // ...
}

class Payment
{
    private ?int $id;
    private ?PaymentMethod $method;
    private ?int $amount;
    private ?string $state;
    // ...
}
```

#### Entidades Customizadas (Novas)

```php
// src/Entity/Vehicle.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Customer;

#[ORM\Entity]
#[ORM\Table(name: 'app_vehicle')]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $owner;

    #[ORM\Column(length: 50)]
    private string $make; // Tesla, BYD, etc

    #[ORM\Column(length: 50)]
    private string $model;

    #[ORM\Column(type: 'integer')]
    private int $year;

    #[ORM\Column(length: 20)]
    private string $licensePlate;

    #[ORM\Column(type: 'integer')]
    private int $batteryCapacityKwh; // 60, 75, 100 kWh

    #[ORM\Column(length: 10)]
    private string $connectorType; // Type 2, CCS, CHAdeMO

    // Getters/Setters...
}

// src/Entity/Station.php
#[ORM\Entity]
#[ORM\Table(name: 'app_station')]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private string $name; // "Shopping Bosque Grão-Pará"

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    private string $latitude;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    private string $longitude;

    #[ORM\Column(length: 255)]
    private string $address;

    #[ORM\Column(length: 50)]
    private string $city;

    #[ORM\Column(length: 2)]
    private string $state; // PA

    #[ORM\OneToMany(
        targetEntity: Charger::class,
        mappedBy: 'station',
        cascade: ['persist', 'remove']
    )]
    private Collection $chargers;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive = true;

    // Getters/Setters...
}

// src/Entity/Charger.php
#[ORM\Entity]
#[ORM\Table(name: 'app_charger')]
class Charger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Station::class, inversedBy: 'chargers')]
    #[ORM\JoinColumn(nullable: false)]
    private Station $station;

    #[ORM\Column(length: 50, unique: true)]
    private string $serialNumber; // TG-DC30-001

    #[ORM\Column(length: 50)]
    private string $model; // DC-30kW

    #[ORM\Column(type: 'integer')]
    private int $powerKw; // 30, 60, 150

    #[ORM\Column(length: 10)]
    private string $chargerType; // AC ou DC

    #[ORM\Column(length: 20)]
    private string $connectorType; // Type 2, CCS

    #[ORM\Column(length: 20)]
    private string $status; // Available, Occupied, Offline, Faulted

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $lastHeartbeat;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $firmwareVersion;

    // Getters/Setters...
}

// src/Entity/ChargingSession.php
#[ORM\Entity]
#[ORM\Table(name: 'app_charging_session')]
class ChargingSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $customer;

    #[ORM\ManyToOne(targetEntity: Charger::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Charger $charger;

    #[ORM\ManyToOne(targetEntity: Vehicle::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Vehicle $vehicle;

    #[ORM\OneToOne(targetEntity: Order::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Order $order; // Link para Sylius Order

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $ocppTransactionId;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $startTime;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $endTime;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $meterStartKwh;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $meterEndKwh;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $energyConsumedKwh;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $durationSeconds;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $costAmount; // Em centavos

    #[ORM\Column(length: 20)]
    private string $status; // Active, Completed, Failed

    // Getters/Setters...
}
```

### 3.2 Repositórios Customizados

```php
// src/Repository/ChargerRepository.php
namespace App\Repository;

use App\Entity\Charger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ChargerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Charger::class);
    }

    public function findAvailableNearby(
        float $latitude,
        float $longitude,
        int $radiusKm = 5
    ): array {
        // Query com cálculo de distância Haversine
        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.station', 's')
            ->where('c.status = :status')
            ->setParameter('status', 'Available')
            ->andWhere('
                (6371 * acos(
                    cos(radians(:lat)) *
                    cos(radians(s.latitude)) *
                    cos(radians(s.longitude) - radians(:lng)) +
                    sin(radians(:lat)) *
                    sin(radians(s.latitude))
                )) < :radius
            ')
            ->setParameter('lat', $latitude)
            ->setParameter('lng', $longitude)
            ->setParameter('radius', $radiusKm)
            ->orderBy('s.latitude', 'ASC'); // Placeholder, usar distância

        return $qb->getQuery()->getResult();
    }

    public function updateStatus(
        int $chargerId,
        string $newStatus
    ): void {
        $this->createQueryBuilder('c')
            ->update()
            ->set('c.status', ':status')
            ->set('c.lastHeartbeat', ':now')
            ->where('c.id = :id')
            ->setParameter('status', $newStatus)
            ->setParameter('now', new \DateTime())
            ->setParameter('id', $chargerId)
            ->getQuery()
            ->execute();
    }
}
```

---

## 4. SERVIDOR OCPP COM RATCHET

### 4.1 Implementação WebSocket

```php
// src/WebSocket/OcppServer.php
namespace App\WebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class OcppServer implements MessageComponentInterface
{
    protected \SplObjectStorage $clients;
    protected array $chargers = []; // chargePointId => ConnectionInterface

    public function __construct(
        private OcppMessageHandler $messageHandler
    ) {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn): void
    {
        $this->clients->attach($conn);

        // Extract chargePointId from URL: /ocpp/{chargePointId}
        $path = $conn->httpRequest->getUri()->getPath();
        preg_match('#/ocpp/(.+)$#', $path, $matches);
        $chargePointId = $matches[1] ?? 'unknown';

        $conn->chargePointId = $chargePointId;
        $this->chargers[$chargePointId] = $conn;

        echo "Charger connected: {$chargePointId}\n";
    }

    public function onMessage(
        ConnectionInterface $from,
        $msg
    ): void {
        echo "Message from {$from->chargePointId}: {$msg}\n";

        try {
            // Parse OCPP message (JSON array format)
            $ocppMsg = json_decode($msg, true);

            if (!is_array($ocppMsg) || count($ocppMsg) < 3) {
                throw new \Exception('Invalid OCPP message format');
            }

            [$messageType, $uniqueId, $action, $payload] = array_pad(
                $ocppMsg,
                4,
                null
            );

            // Handle message
            $response = $this->messageHandler->handle(
                $from->chargePointId,
                $messageType,
                $uniqueId,
                $action,
                $payload ?? []
            );

            // Send response
            if ($response) {
                $from->send(json_encode($response));
            }

        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";

            // Send error response
            $errorResponse = [
                4, // CALLERROR
                $uniqueId ?? 'unknown',
                'InternalError',
                $e->getMessage(),
                []
            ];
            $from->send(json_encode($errorResponse));
        }
    }

    public function onClose(ConnectionInterface $conn): void
    {
        $this->clients->detach($conn);
        unset($this->chargers[$conn->chargePointId]);

        echo "Charger disconnected: {$conn->chargePointId}\n";
    }

    public function onError(
        ConnectionInterface $conn,
        \Exception $e
    ): void {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }

    // Método para enviar comando para carregador
    public function sendRemoteStartTransaction(
        string $chargePointId,
        string $idTag
    ): bool {
        if (!isset($this->chargers[$chargePointId])) {
            return false;
        }

        $conn = $this->chargers[$chargePointId];
        $uniqueId = uniqid();

        $message = [
            2, // CALL
            $uniqueId,
            'RemoteStartTransaction',
            [
                'idTag' => $idTag,
                'connectorId' => 1
            ]
        ];

        $conn->send(json_encode($message));
        return true;
    }
}

// bin/ocpp-server.php (Script para rodar o servidor)
#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use App\WebSocket\OcppServer;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

// Carregar Symfony Kernel para acesso aos serviços
$kernel = new \App\Kernel('prod', false);
$kernel->boot();
$container = $kernel->getContainer();

$messageHandler = $container->get(OcppMessageHandler::class);
$ocppServer = new OcppServer($messageHandler);

$server = IoServer::factory(
    new HttpServer(
        new WsServer($ocppServer)
    ),
    8080, // Porta WebSocket
    '0.0.0.0'
);

echo "OCPP Server running on ws://0.0.0.0:8080\n";
$server->run();
```

### 4.2 Handler de Mensagens OCPP

```php
// src/Service/OcppMessageHandler.php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Charger;
use App\Entity\ChargingSession;

class OcppMessageHandler
{
    public function __construct(
        private EntityManagerInterface $em,
        private BootNotificationHandler $bootHandler,
        private StartTransactionHandler $startHandler,
        private StopTransactionHandler $stopHandler,
        private HeartbeatHandler $heartbeatHandler
    ) {}

    public function handle(
        string $chargePointId,
        int $messageType,
        string $uniqueId,
        ?string $action,
        array $payload
    ): ?array {
        // Message type: 2=CALL, 3=CALLRESULT, 4=CALLERROR
        if ($messageType !== 2) {
            return null; // Ignorar respostas
        }

        return match($action) {
            'BootNotification' => $this->bootHandler->handle(
                $chargePointId,
                $uniqueId,
                $payload
            ),
            'Heartbeat' => $this->heartbeatHandler->handle(
                $chargePointId,
                $uniqueId
            ),
            'StartTransaction' => $this->startHandler->handle(
                $chargePointId,
                $uniqueId,
                $payload
            ),
            'StopTransaction' => $this->stopHandler->handle(
                $chargePointId,
                $uniqueId,
                $payload
            ),
            'StatusNotification' => $this->handleStatusNotification(
                $chargePointId,
                $uniqueId,
                $payload
            ),
            'MeterValues' => $this->handleMeterValues(
                $chargePointId,
                $uniqueId,
                $payload
            ),
            default => throw new \Exception("Unknown action: {$action}")
        };
    }

    private function handleStatusNotification(
        string $chargePointId,
        string $uniqueId,
        array $payload
    ): array {
        $charger = $this->em
            ->getRepository(Charger::class)
            ->findOneBy(['serialNumber' => $chargePointId]);

        if ($charger) {
            $status = $payload['status'] ?? 'Unknown';
            $charger->setStatus($status);
            $charger->setLastHeartbeat(new \DateTime());
            $this->em->flush();
        }

        return [
            3, // CALLRESULT
            $uniqueId,
            [] // Empty payload
        ];
    }

    private function handleMeterValues(
        string $chargePointId,
        string $uniqueId,
        array $payload
    ): array {
        // Atualizar consumo em tempo real
        $transactionId = $payload['transactionId'] ?? null;

        if ($transactionId) {
            $session = $this->em
                ->getRepository(ChargingSession::class)
                ->findOneBy(['ocppTransactionId' => $transactionId]);

            if ($session) {
                $meterValues = $payload['meterValue'][0]['sampledValue'] ?? [];

                foreach ($meterValues as $value) {
                    if ($value['measurand'] === 'Energy.Active.Import.Register') {
                        $energyWh = (float) $value['value'];
                        $session->setMeterEndKwh($energyWh / 1000);
                        $session->setEnergyConsumedKwh(
                            $session->getMeterEndKwh() - $session->getMeterStartKwh()
                        );
                    }
                }

                $this->em->flush();
            }
        }

        return [
            3, // CALLRESULT
            $uniqueId,
            []
        ];
    }
}
```

---

## 5. API REST COM API PLATFORM

### 5.1 Configuração de Recursos

```php
// src/Entity/Station.php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
    ],
    paginationEnabled: true,
    paginationItemsPerPage: 20
)]
#[ORM\Entity]
class Station
{
    // ... (entidade já definida anteriormente)
}

// Automaticamente gera endpoints:
// GET /api/stations
// GET /api/stations/{id}
```

### 5.2 Endpoints Customizados

```php
// src/Controller/Api/ChargingController.php
namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ChargingService;

#[Route('/api/v1/charging', name: 'api_charging_')]
class ChargingController extends AbstractController
{
    public function __construct(
        private ChargingService $chargingService
    ) {}

    #[Route('/start', name: 'start', methods: ['POST'])]
    public function start(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $chargerId = $data['chargerId'];
        $customerId = $this->getUser()->getId();

        try {
            $session = $this->chargingService->startCharging(
                $customerId,
                $chargerId
            );

            return $this->json([
                'success' => true,
                'sessionId' => $session->getId(),
                'message' => 'Charging started successfully'
            ]);

        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/stop/{sessionId}', name: 'stop', methods: ['POST'])]
    public function stop(int $sessionId): JsonResponse
    {
        try {
            $session = $this->chargingService->stopCharging($sessionId);

            return $this->json([
                'success' => true,
                'energyConsumed' => $session->getEnergyConsumedKwh(),
                'cost' => $session->getCostAmount(),
                'duration' => $session->getDurationSeconds()
            ]);

        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/history', name: 'history', methods: ['GET'])]
    public function history(): JsonResponse
    {
        $customerId = $this->getUser()->getId();
        $sessions = $this->chargingService->getHistory($customerId);

        return $this->json($sessions);
    }
}
```

---

## 6. FRONTEND COM SYLIUS

### 6.1 Customização do SyliusShopBundle

```yaml
# config/packages/sylius_shop.yaml
sylius_shop:
    checkout:
        redirect_to_cart_if_empty: true
    product_grid:
        include_all_descendants: true
```

```twig
{# templates/bundles/SyliusShopBundle/Homepage/index.html.twig #}
{% extends '@SyliusShop/layout.html.twig' %}

{% block content %}
<div class="ui container">
    <h1>Encontre Eletropostos em Belém</h1>

    {# Mapa de estações #}
    <div id="stations-map" style="height: 500px;"></div>

    {# Lista de estações próximas #}
    <div class="ui cards">
        {% for station in stations %}
            <div class="card">
                <div class="content">
                    <div class="header">{{ station.name }}</div>
                    <div class="meta">{{ station.address }}</div>
                    <div class="description">
                        {{ station.chargers|length }} carregadores disponíveis
                    </div>
                </div>
                <div class="extra content">
                    <a href="{{ path('app_station_show', {id: station.id}) }}"
                       class="ui primary button">
                        Ver Detalhes
                    </a>
                </div>
            </div>
        {% endfor %}
    </div>
</div>

<script>
// Inicializar Google Maps
function initMap() {
    const map = new google.maps.Map(document.getElementById('stations-map'), {
        center: {lat: -1.4558, lng: -48.4902}, // Belém
        zoom: 12
    });

    // Adicionar marcadores
    {% for station in stations %}
        new google.maps.Marker({
            position: {
                lat: {{ station.latitude }},
                lng: {{ station.longitude }}
            },
            map: map,
            title: '{{ station.name }}'
        });
    {% endfor %}
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
        async defer></script>
{% endblock %}
```

### 6.2 Vue.js SPA (Opcional)

```vue
<!-- assets/vue/components/StationMap.vue -->
<template>
  <div class="station-map">
    <div id="map" ref="mapContainer"></div>

    <div class="station-list">
      <h3>Estações Próximas</h3>
      <ul>
        <li v-for="station in stations" :key="station.id">
          <h4>{{ station.name }}</h4>
          <p>{{ station.address }}</p>
          <p>{{ availableChargers(station) }} disponíveis</p>
          <button @click="selectStation(station)">Ver Detalhes</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useStationStore } from '@/stores/station';

const stationStore = useStationStore();
const stations = ref([]);
const mapContainer = ref(null);
let map;

onMounted(async () => {
  await fetchStations();
  initMap();
});

async function fetchStations() {
  const response = await fetch('/api/stations');
  stations.value = await response.json();
}

function initMap() {
  map = new google.maps.Map(mapContainer.value, {
    center: { lat: -1.4558, lng: -48.4902 },
    zoom: 12
  });

  stations.value.forEach(station => {
    new google.maps.Marker({
      position: { lat: station.latitude, lng: station.longitude },
      map: map,
      title: station.name
    });
  });
}

function availableChargers(station) {
  return station.chargers.filter(c => c.status === 'Available').length;
}

function selectStation(station) {
  stationStore.setSelected(station);
  // Navigate ou open modal
}
</script>
```

---

## 7. INTEGRAÇÃO DE PAGAMENTOS

### 7.1 SyliusPaymentBundle + Stripe

```yaml
# config/packages/sylius_payment.yaml
sylius_payment:
    gateways:
        stripe:
            factory: stripe_checkout
            # Configurar via Sylius Admin
```

```php
// src/Payum/StripeCheckoutGatewayFactory.php
namespace App\Payum;

use Payum\Core\GatewayFactory;

class StripeCheckoutGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config): void
    {
        $config->defaults([
            'payum.factory_name' => 'stripe_checkout',
            'payum.factory_title' => 'Stripe Checkout',
        ]);

        // Implementação do gateway Stripe
    }
}
```

### 7.2 Pix via Mercado Pago

```php
// src/Service/PixPaymentService.php
namespace App\Service;

use MercadoPago\SDK;
use MercadoPago\Payment;

class PixPaymentService
{
    public function __construct(
        private string $mercadoPagoAccessToken
    ) {
        SDK::setAccessToken($this->mercadoPagoAccessToken);
    }

    public function createPixPayment(
        float $amount,
        string $description,
        string $customerEmail
    ): array {
        $payment = new Payment();
        $payment->transaction_amount = $amount;
        $payment->description = $description;
        $payment->payment_method_id = "pix";
        $payment->payer = [
            "email" => $customerEmail
        ];

        $payment->save();

        return [
            'qr_code' => $payment->point_of_interaction->transaction_data->qr_code,
            'qr_code_base64' => $payment->point_of_interaction->transaction_data->qr_code_base64,
            'payment_id' => $payment->id
        ];
    }
}
```

---

## 8. DEPLOYMENT

### 8.1 Docker Compose

```yaml
# docker-compose.yml
version: '3.8'

services:
  php:
    build:
      context: .
      dockerfile: Dockerfile
    volumes:
      - .:/var/www/html
    depends_on:
      - database
      - redis

  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - .:/var/www/html
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - php

  database:
    image: postgres:15-alpine
    environment:
      POSTGRES_DB: sylius
      POSTGRES_USER: sylius
      POSTGRES_PASSWORD: ${DATABASE_PASSWORD}
    volumes:
      - postgres_data:/var/lib/postgresql/data
    ports:
      - "5432:5432"

  redis:
    image: redis:7-alpine
    ports:
      - "6379:6379"

  ocpp_server:
    build:
      context: .
      dockerfile: Dockerfile
    command: php bin/ocpp-server.php
    ports:
      - "8080:8080"
    depends_on:
      - database
      - redis

volumes:
  postgres_data:
```

### 8.2 Dockerfile

```dockerfile
# Dockerfile
FROM php:8.3-fpm-alpine

# Instalar extensões PHP
RUN apk add --no-cache \
    postgresql-dev \
    icu-dev \
    libzip-dev \
    && docker-php-ext-install \
    pdo_pgsql \
    intl \
    zip \
    opcache

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar working directory
WORKDIR /var/www/html

# Copiar arquivos
COPY . .

# Instalar dependências
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
```

---

## 9. PRÓXIMOS PASSOS

### 9.1 Instalação Sylius

```bash
# 1. Criar projeto
composer create-project sylius/sylius-standard eletropostos

# 2. Configurar banco
# Editar .env com PostgreSQL

# 3. Instalar Sylius
php bin/console sylius:install

# 4. Iniciar servidor
symfony server:start

# 5. Acessar admin
# https://localhost:8000/admin (sylius@example.com / sylius)
```

### 9.2 Customizações Prioritárias

1. **Criar entidades customizadas** (Vehicle, Station, Charger, ChargingSession)
2. **Implementar servidor OCPP** com Ratchet
3. **Customizar frontend Sylius** para eletropostos
4. **Integrar Google Maps API**
5. **Configurar pagamentos** (Stripe + Pix)

---

**Documento Técnico - Arquitetura Sylius**
**Versão:** 2.0
**Aprovação Necessária:** Arquiteto + CTO
