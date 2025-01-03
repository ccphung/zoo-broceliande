<?php

namespace App\Entity;

use App\Repository\VetReportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VetReportRepository::class)]
class VetReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vetReport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'vetReport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'état de l'animal ne peut pas être vide.")]
    private ?string $animalCondition = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "La nourriture suggérée ne peut pas être nulle.")]
    private ?Food $suggestedFood = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La quantité ne peut pas être vide.")]
    #[Assert\Type(type: "numeric", message: "La quantité doit être un nombre.")]
    #[Assert\GreaterThanOrEqual(value: 1, message: "La quantité doit être supérieure ou égale à 1.")]
    private ?int $foodQuantity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "La date de la visite est obligatoire.")]
    #[Assert\LessThanOrEqual(
        value: "now",
        message: "La date de la visite ne peut pas être dans le futur."
    )]
    private ?\DateTimeInterface $visitDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $animalConditionDetail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getAnimalCondition(): ?string
    {
        return $this->animalCondition;
    }

    public function setAnimalCondition(string $animalCondition): static
    {
        $this->animalCondition = $animalCondition;

        return $this;
    }

    public function getSuggestedFood(): ?Food
    {
        return $this->suggestedFood;
    }

    public function setSuggestedFood(?Food $suggestedFood): static
    {
        $this->suggestedFood = $suggestedFood;

        return $this;
    }

    public function getFoodQuantity(): ?int
    {
        return $this->foodQuantity;
    }

    public function setFoodQuantity(int $foodQuantity): static
    {
        $this->foodQuantity = $foodQuantity;

        return $this;
    }

    public function getVisitDate(): ?\DateTimeInterface
    {
        return $this->visitDate;
    }

    public function setVisitDate(\DateTimeInterface $visitDate): static
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    public function getAnimalConditionDetail(): ?string
    {
        return $this->animalConditionDetail;
    }

    public function setAnimalConditionDetail(?string $animalConditionDetail): static
    {
        $this->animalConditionDetail = $animalConditionDetail;

        return $this;
    }
}
