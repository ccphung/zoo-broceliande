<?php

namespace App\Entity;

use App\Repository\FeedRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FeedRepository::class)]
class Feed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'feeds')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "La nourriture est obligatoire.")]
    private ?Food $food = null;

    #[ORM\ManyToOne(inversedBy: 'feeds')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "L'animal est obligatoire.")]
    private ?Animal $animal = null;

    #[ORM\Column]
    #[Assert\Type(type: "numeric", message: "La quantité doit être un nombre.")]
    #[Assert\GreaterThanOrEqual(value: 0, message: "La quantité doit être supérieure ou égale à 0.")]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: "La date est obligatoire.")]
    #[Assert\Type(\DateTimeInterface::class, message: "La date doit être valide.")]
    #[Assert\LessThanOrEqual("now", message: "La date ne peut pas être dans le futur.")]
    private ?\DateTimeInterface $date = null;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFood(): ?Food
    {
        return $this->food;
    }

    public function setFood(?Food $food): static
    {
        $this->food = $food;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
