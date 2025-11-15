<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\Charging\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\CustomerInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[ORM\Table(name: 'charging_vehicle')]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['vehicle:read']],
            security: "is_granted('ROLE_USER') and object.getCustomer() == user or is_granted('ROLE_ADMIN')"
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['vehicle:read']],
            security: "is_granted('ROLE_USER')"
        ),
        new Post(
            denormalizationContext: ['groups' => ['vehicle:write']],
            security: "is_granted('ROLE_USER')"
        ),
        new Put(
            denormalizationContext: ['groups' => ['vehicle:write']],
            security: "is_granted('ROLE_USER') and object.getCustomer() == user or is_granted('ROLE_ADMIN')"
        ),
        new Delete(
            security: "is_granted('ROLE_USER') and object.getCustomer() == user or is_granted('ROLE_ADMIN')"
        ),
    ],
    normalizationContext: ['groups' => ['vehicle:read']],
    denormalizationContext: ['groups' => ['vehicle:write']],
)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['vehicle:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CustomerInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['vehicle:read'])]
    private CustomerInterface $customer;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private string $brand;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private string $model;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\Range(min: 2010, max: 2030)]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private int $year;

    #[ORM\Column(type: 'string', length: 10, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^[A-Z]{3}[0-9][A-Z0-9][0-9]{2}$/')]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private string $licensePlate;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['Type 2', 'CCS2', 'CHAdeMO', 'GB/T'])]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private string $connectorType;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private int $batteryCapacityKwh;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Positive]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private ?int $maxChargingPowerKw = null;

    #[ORM\Column(type: 'string', length: 100, unique: true, nullable: true)]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private ?string $rfidTag = null;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['vehicle:read', 'vehicle:write'])]
    private bool $isPrimary = false;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['vehicle:read'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['vehicle:read'])]
    private \DateTimeImmutable $updatedAt;

    public function __construct()
    {
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

    public function getCustomer(): CustomerInterface
    {
        return $this->customer;
    }

    public function setCustomer(CustomerInterface $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
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

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;
        return $this;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): self
    {
        $this->licensePlate = strtoupper($licensePlate);
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

    public function getBatteryCapacityKwh(): int
    {
        return $this->batteryCapacityKwh;
    }

    public function setBatteryCapacityKwh(int $batteryCapacityKwh): self
    {
        $this->batteryCapacityKwh = $batteryCapacityKwh;
        return $this;
    }

    public function getMaxChargingPowerKw(): ?int
    {
        return $this->maxChargingPowerKw;
    }

    public function setMaxChargingPowerKw(?int $maxChargingPowerKw): self
    {
        $this->maxChargingPowerKw = $maxChargingPowerKw;
        return $this;
    }

    public function getRfidTag(): ?string
    {
        return $this->rfidTag;
    }

    public function setRfidTag(?string $rfidTag): self
    {
        $this->rfidTag = $rfidTag;
        return $this;
    }

    public function isPrimary(): bool
    {
        return $this->isPrimary;
    }

    public function setIsPrimary(bool $isPrimary): self
    {
        $this->isPrimary = $isPrimary;
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

    public function __toString(): string
    {
        return sprintf('%s %s (%s)', $this->brand, $this->model, $this->licensePlate);
    }
}
