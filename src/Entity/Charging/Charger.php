<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\Charging\ChargerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ChargerRepository::class)]
#[ORM\Table(name: 'charging_charger')]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['charger:read', 'charger:read:detail']]
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['charger:read']]
        ),
        new Post(
            denormalizationContext: ['groups' => ['charger:write']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            denormalizationContext: ['groups' => ['charger:write']],
            security: "is_granted('ROLE_ADMIN')"
        ),
    ],
    normalizationContext: ['groups' => ['charger:read']],
    denormalizationContext: ['groups' => ['charger:write']],
)]
class Charger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['charger:read', 'station:read:detail'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Station::class, inversedBy: 'chargers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    #[Groups(['charger:read', 'charger:write'])]
    private Station $station;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    #[Assert\NotBlank]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private string $serialNumber;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private string $model;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private string $manufacturer;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private int $powerKw;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['Available', 'Occupied', 'Reserved', 'Offline', 'Faulted', 'Maintenance'])]
    #[Groups(['charger:read', 'station:read:detail'])]
    private string $status = 'Offline';

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['AC', 'DC'])]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private string $chargerType;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\Choice(choices: ['Type 2', 'CCS2', 'CHAdeMO', 'GB/T'])]
    #[Groups(['charger:read', 'charger:write', 'station:read:detail'])]
    private string $connectorType;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    #[Groups(['charger:read'])]
    private ?string $ocppChargePointId = null;

    #[ORM\Column(type: 'string', length: 10)]
    #[Groups(['charger:read', 'charger:write'])]
    private string $ocppVersion = '1.6';

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    #[Groups(['charger:read'])]
    private ?\DateTimeImmutable $lastHeartbeat = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    #[Groups(['charger:read', 'charger:write'])]
    private ?string $firmwareVersion = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['charger:read'])]
    private ?string $currentPowerKw = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[Groups(['charger:read:detail'])]
    private ?array $errorCodes = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['charger:read', 'charger:write'])]
    private bool $isEnabled = true;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['charger:read'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['charger:read'])]
    private \DateTimeImmutable $updatedAt;

    /**
     * @var Collection<int, ChargingSession>
     */
    #[ORM\OneToMany(targetEntity: ChargingSession::class, mappedBy: 'charger')]
    private Collection $chargingSessions;

    public function __construct()
    {
        $this->chargingSessions = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStation(): Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;
        return $this;
    }

    public function getSerialNumber(): string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getPowerKw(): int
    {
        return $this->powerKw;
    }

    public function setPowerKw(int $powerKw): self
    {
        $this->powerKw = $powerKw;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getChargerType(): string
    {
        return $this->chargerType;
    }

    public function setChargerType(string $chargerType): self
    {
        $this->chargerType = $chargerType;
        return $this;
    }

    public function getConnectorType(): string
    {
        return $this->connectorType;
    }

    public function setConnectorType(string $connectorType): self
    {
        $this->connectorType = $connectorType;
        return $this;
    }

    public function getOcppChargePointId(): ?string
    {
        return $this->ocppChargePointId;
    }

    public function setOcppChargePointId(?string $ocppChargePointId): self
    {
        $this->ocppChargePointId = $ocppChargePointId;
        return $this;
    }

    public function getOcppVersion(): string
    {
        return $this->ocppVersion;
    }

    public function setOcppVersion(string $ocppVersion): self
    {
        $this->ocppVersion = $ocppVersion;
        return $this;
    }

    public function getLastHeartbeat(): ?\DateTimeImmutable
    {
        return $this->lastHeartbeat;
    }

    public function setLastHeartbeat(?\DateTimeImmutable $lastHeartbeat): self
    {
        $this->lastHeartbeat = $lastHeartbeat;
        return $this;
    }

    public function getFirmwareVersion(): ?string
    {
        return $this->firmwareVersion;
    }

    public function setFirmwareVersion(?string $firmwareVersion): self
    {
        $this->firmwareVersion = $firmwareVersion;
        return $this;
    }

    public function getCurrentPowerKw(): ?string
    {
        return $this->currentPowerKw;
    }

    public function setCurrentPowerKw(?string $currentPowerKw): self
    {
        $this->currentPowerKw = $currentPowerKw;
        return $this;
    }

    public function getErrorCodes(): ?array
    {
        return $this->errorCodes;
    }

    public function setErrorCodes(?array $errorCodes): self
    {
        $this->errorCodes = $errorCodes;
        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection<int, ChargingSession>
     */
    public function getChargingSessions(): Collection
    {
        return $this->chargingSessions;
    }

    #[Groups(['charger:read'])]
    public function isOnline(): bool
    {
        if ($this->lastHeartbeat === null) {
            return false;
        }

        $now = new \DateTimeImmutable();
        $diff = $now->getTimestamp() - $this->lastHeartbeat->getTimestamp();

        // Considera online se recebeu heartbeat nos últimos 5 minutos
        return $diff < 300;
    }

    public function __toString(): string
    {
        return sprintf('%s - %s (%dkW)', $this->manufacturer, $this->model, $this->powerKw);
    }
}
