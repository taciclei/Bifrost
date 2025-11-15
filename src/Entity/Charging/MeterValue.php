<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use App\Repository\Charging\MeterValueRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MeterValueRepository::class)]
#[ORM\Table(name: 'charging_meter_value')]
#[ORM\Index(columns: ['timestamp'], name: 'idx_meter_value_timestamp')]
class MeterValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['session:read:detail'])]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ChargingSession::class, inversedBy: 'meterValues')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ChargingSession $chargingSession;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['session:read:detail'])]
    private \DateTimeImmutable $timestamp;

    #[ORM\Column(type: 'integer')]
    #[Groups(['session:read:detail'])]
    private int $meterValue;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['session:read:detail'])]
    private string $measurand = 'Energy.Active.Import.Register';

    #[ORM\Column(type: 'string', length: 20)]
    #[Groups(['session:read:detail'])]
    private string $unit = 'Wh';

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    #[Groups(['session:read:detail'])]
    private ?string $powerKw = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    #[Groups(['session:read:detail'])]
    private ?string $currentA = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    #[Groups(['session:read:detail'])]
    private ?string $voltageV = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Groups(['session:read:detail'])]
    private ?int $socPercent = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
    #[Groups(['session:read:detail'])]
    private ?string $temperature = null;

    public function __construct()
    {
        $this->timestamp = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChargingSession(): ChargingSession
    {
        return $this->chargingSession;
    }

    public function setChargingSession(ChargingSession $chargingSession): self
    {
        $this->chargingSession = $chargingSession;
        return $this;
    }

    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getMeterValue(): int
    {
        return $this->meterValue;
    }

    public function setMeterValue(int $meterValue): self
    {
        $this->meterValue = $meterValue;
        return $this;
    }

    public function getMeasurand(): string
    {
        return $this->measurand;
    }

    public function setMeasurand(string $measurand): self
    {
        $this->measurand = $measurand;
        return $this;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;
        return $this;
    }

    public function getPowerKw(): ?string
    {
        return $this->powerKw;
    }

    public function setPowerKw(?string $powerKw): self
    {
        $this->powerKw = $powerKw;
        return $this;
    }

    public function getCurrentA(): ?string
    {
        return $this->currentA;
    }

    public function setCurrentA(?string $currentA): self
    {
        $this->currentA = $currentA;
        return $this;
    }

    public function getVoltageV(): ?string
    {
        return $this->voltageV;
    }

    public function setVoltageV(?string $voltageV): self
    {
        $this->voltageV = $voltageV;
        return $this;
    }

    public function getSocPercent(): ?int
    {
        return $this->socPercent;
    }

    public function setSocPercent(?int $socPercent): self
    {
        $this->socPercent = $socPercent;
        return $this;
    }

    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    public function setTemperature(?string $temperature): self
    {
        $this->temperature = $temperature;
        return $this;
    }
}
