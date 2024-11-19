<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
#[Vich\Uploadable]
class Habitat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[Vich\UploadableField (mapping: 'habitat', fileNameProperty: 'imageName')]
    #[Assert\NotNull(message: "Veuillez ajouter une image.")]
    private ?File $imageFile = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Le nom est obligatoire.")]
    #[Assert\Length(
        max: 50,
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La description est obligatoire.")]
    private ?string $description = null;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'habitat', cascade: ['remove'])]
    private Collection $animals;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'image est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de l'image ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $imageName = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotNull(message: "La date de mise à jour est obligatoire.")]
    #[Assert\Type(\DateTimeImmutable::class, message: "La date doit être valide.")]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $habitatRemark = null;

    #[ORM\Column]
    #[Assert\NotNull(message: "La superficie est obligatoire.")]
    #[Assert\Type(type: "numeric", message: "La superficie doit être un nombre.")]
    #[Assert\Positive(message: "La superficie doit être un nombre positif.")]
    private ?int $area = null;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setHabitat($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitat() === $this) {
                $animal->setHabitat(null);
            }
        }

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getupdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setupdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function setImageFile(?File $imageFile) : void
    {
        $this->imageFile = $imageFile;
    }

    public function getImageFile(): ?File {
        return $this->imageFile;
    }

    public function getHabitatRemark(): ?string
    {
        return $this->habitatRemark;
    }

    public function setHabitatRemark(?string $habitatRemark): static
    {
        $this->habitatRemark = $habitatRemark;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): static
    {
        $this->area = $area;

        return $this;
    }
}