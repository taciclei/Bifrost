<?php

declare(strict_types=1);

namespace App\Entity\Charging;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Delete;
use App\Repository\Charging\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[ORM\Table(name: 'charging_station')]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['station:read', 'station:read:detail']]
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['station:read']]
        ),
        new Post(
            denormalizationContext: ['groups' => ['station:write']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            denormalizationContext: ['groups' => ['station:write']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')"
        ),
    ],
    normalizationContext: ['groups' => ['station:read']],
    denormalizationContext: ['groups' => ['station:write']],
    paginationEnabled: true,
)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['station:read'])]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['station:read', 'station:write'])]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(['station:read', 'station:write'])]
    private ?string $description = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    #[Assert\NotBlank]
    #[Assert\Range(min: -90, max: 90)]
    #[Groups(['station:read', 'station:write'])]
    private string $latitude;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7)]
    #[Assert\NotBlank]
    #[Assert\Range(min: -180, max: 180)]
    #[Groups(['station:read', 'station:write'])]
    private string $longitude;

    #[ORM\Column(type: 'string', length: 200)]
    #[Assert\NotBlank]
    #[Groups(['station:read', 'station:write'])]
    private string $address;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank]
    #[Groups(['station:read', 'station:write'])]
    private string $city;

    #[ORM\Column(type: 'string', length: 2)]
    #[Assert\NotBlank]
    #[Assert\Length(exactly: 2)]
    #[Groups(['station:read', 'station:write'])]
    private string $state = 'PA';

    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^\d{5}-\d{3}$/')]
    #[Groups(['station:read', 'station:write'])]
    private string $zipCode;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\Choice(choices: ['Online', 'Offline', 'Maintenance'])]
    #[Groups(['station:read'])]
    private string $status = 'Offline';

    #[ORM\Column(type: 'boolean')]
    #[Groups(['station:read', 'station:write'])]
    private bool $isPublic = true;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    #[Groups(['station:read', 'station:write'])]
    private ?string $accessInstructions = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[Groups(['station:read', 'station:write'])]
    private ?array $openingHours = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[Groups(['station:read', 'station:write'])]
    private ?array $amenities = null;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['station:read'])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups(['station:read'])]
    private \DateTimeImmutable $updatedAt;

    /**
     * @var Collection<int, Charger>
     */
    #[ORM\OneToMany(targetEntity: Charger::class, mappedBy: 'station', cascade: ['persist', 'remove'])]
    #[Groups(['station:read:detail'])]
    private Collection $chargers;

    public function __construct()
    {
        $this->chargers = new ArrayCollection();
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;
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

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    public function getAccessInstructions(): ?string
    {
        return $this->accessInstructions;
    }

    public function setAccessInstructions(?string $accessInstructions): self
    {
        $this->accessInstructions = $accessInstructions;
        return $this;
    }

    public function getOpeningHours(): ?array
    {
        return $this->openingHours;
    }

    public function setOpeningHours(?array $openingHours): self
    {
        $this->openingHours = $openingHours;
        return $this;
    }

    public function getAmenities(): ?array
    {
        return $this->amenities;
    }

    public function setAmenities(?array $amenities): self
    {
        $this->amenities = $amenities;
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
     * @return Collection<int, Charger>
     */
    public function getChargers(): Collection
    {
        return $this->chargers;
    }

    public function addCharger(Charger $charger): self
    {
        if (!$this->chargers->contains($charger)) {
            $this->chargers->add($charger);
            $charger->setStation($this);
        }

        return $this;
    }

    public function removeCharger(Charger $charger): self
    {
        if ($this->chargers->removeElement($charger)) {
            if ($charger->getStation() === $this) {
                $charger->setStation(null);
            }
        }

        return $this;
    }

    #[Groups(['station:read'])]
    public function getAvailableChargersCount(): int
    {
        return $this->chargers->filter(
            fn(Charger $charger) => $charger->getStatus() === 'Available'
        )->count();
    }

    #[Groups(['station:read'])]
    public function getTotalChargersCount(): int
    {
        return $this->chargers->count();
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
