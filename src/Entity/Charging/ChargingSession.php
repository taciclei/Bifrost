<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\Charging\ChargingSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\CustomerInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ChargingSessionRepository::class)]
#[ORM\Table(name: 'charging_session')]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['session:read', 'session:read:detail']],
            security: "is_granted('ROLE_USER') and object.getCustomer() == user or is_granted('ROLE_ADMIN')"
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['session:read']],
            security: "is_granted('ROLE_USER')"
        ),
        new Post(
            denormalizationContext: ['groups' => ['session:write']],
            security: "is_granted('ROLE_USER')"
        ),
    ],
    normalizationContext: ['groups' => ['session:read']],
    denormalizationContext: ['groups' => ['session:write']],
)]
class ChargingSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['session:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: CustomerInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    #[Groups(['session:read', 'session:write'])]
    private CustomerInterface $customer;

    #[ORM\ManyToOne(targetEntity: Charger::class, inversedBy: 'chargingSessions')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    #[Groups(['session:read', 'session:write'])]
    private Charger $charger;

    #[ORM\Column(type: 'integer', unique: true, nullable: true)]
    #[Groups(['session:read'])]
    private ?int $ocppTransactionId = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?string $rfidTag = null;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['session:read'])]
    private \DateTimeImmutable $startTime;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    #[Groups(['session:read'])]
    private ?\DateTimeImmutable $endTime = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['session:read'])]
    private ?int $meterStart = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['session:read'])]
    private ?int $meterEnd = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 3, nullable: true)]
    #[Groups(['session:read'])]
    private ?string $energyDeliveredKwh = null;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['Active', 'Completed', 'Cancelled', 'Faulted'])]
    #[Groups(['session:read'])]
    private string $status = 'Active';

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['Pending', 'Authorized', 'Paid', 'Failed'])]
    #[Groups(['session:read'])]
    private string $paymentStatus = 'Pending';

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['session:read'])]
    private ?string $totalCost = null;

    #[ORM\Column(type: 'decimal', precision: 8, scale: 2, nullable: true)]
    #[Groups(['session:read', 'session:write'])]
    private ?string $tariffPerKwh = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['session:read'])]
    private ?string $stopReason = null;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['session:read'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['session:read'])]
    private \DateTimeImmutable $updatedAt;

    /**
     * @var Collection<int, MeterValue>
     */
    #[ORM\OneToMany(targetEntity: MeterValue::class, mappedBy: 'chargingSession', cascade: ['persist', 'remove'])]
    #[Groups(['session:read:detail'])]
    private Collection $meterValues;

    public function __construct()
    {
        $this->meterValues = new ArrayCollection();
        $this->startTime = new \DateTimeImmutable();
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

    public function getCharger(): Charger
    {
        return $this->charger;
    }

    public function setCharger(Charger $charger): self
    {
        $this->charger = $charger;
        return $this;
    }

    public function getOcppTransactionId(): ?int
    {
        return $this->ocppTransactionId;
    }

    public function setOcppTransactionId(?int $ocppTransactionId): self
    {
        $this->ocppTransactionId = $ocppTransactionId;
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

    public function getStartTime(): \DateTimeImmutable
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeImmutable $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getEndTime(): ?\DateTimeImmutable
    {
        return $this->endTime;
    }

    public function setEndTime(?\DateTimeImmutable $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getMeterStart(): ?int
    {
        return $this->meterStart;
    }

    public function setMeterStart(?int $meterStart): self
    {
        $this->meterStart = $meterStart;
        return $this;
    }

    public function getMeterEnd(): ?int
    {
        return $this->meterEnd;
    }

    public function setMeterEnd(?int $meterEnd): self
    {
        $this->meterEnd = $meterEnd;
        return $this;
    }

    public function getEnergyDeliveredKwh(): ?string
    {
        return $this->energyDeliveredKwh;
    }

    public function setEnergyDeliveredKwh(?string $energyDeliveredKwh): self
    {
        $this->energyDeliveredKwh = $energyDeliveredKwh;
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

    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    public function getTotalCost(): ?string
    {
        return $this->totalCost;
    }

    public function setTotalCost(?string $totalCost): self
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    public function getTariffPerKwh(): ?string
    {
        return $this->tariffPerKwh;
    }

    public function setTariffPerKwh(?string $tariffPerKwh): self
    {
        $this->tariffPerKwh = $tariffPerKwh;
        return $this;
    }

    public function getStopReason(): ?string
    {
        return $this->stopReason;
    }

    public function setStopReason(?string $stopReason): self
    {
        $this->stopReason = $stopReason;
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
     * @return Collection<int, MeterValue>
     */
    public function getMeterValues(): Collection
    {
        return $this->meterValues;
    }

    public function addMeterValue(MeterValue $meterValue): self
    {
        if (!$this->meterValues->contains($meterValue)) {
            $this->meterValues->add($meterValue);
            $meterValue->setChargingSession($this);
        }

        return $this;
    }

    #[Groups(['session:read'])]
    public function getDurationMinutes(): ?int
    {
        if ($this->endTime === null) {
            $endTime = new \DateTimeImmutable();
        } else {
            $endTime = $this->endTime;
        }

        $diff = $endTime->getTimestamp() - $this->startTime->getTimestamp();
        return (int) ($diff / 60);
    }

    public function calculateCost(): void
    {
        if ($this->energyDeliveredKwh !== null && $this->tariffPerKwh !== null) {
            $this->totalCost = (string) ((float) $this->energyDeliveredKwh * (float) $this->tariffPerKwh);
        }
    }

    public function __toString(): string
    {
        return sprintf('Session #%d - %s', $this->id, $this->status);
    }
}
