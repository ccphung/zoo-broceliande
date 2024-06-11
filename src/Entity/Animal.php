<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $state = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?habitat $habitat = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?species $species = null;

    /**
     * @var Collection<int, vetreport>
     */
    #[ORM\OneToMany(targetEntity: vetreport::class, mappedBy: 'animal')]
    private Collection $vetReport;

    public function __construct()
    {
        $this->vetReport = new ArrayCollection();
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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getHabitat(): ?habitat
    {
        return $this->habitat;
    }

    public function setHabitat(?habitat $habitat): static
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getSpecies(): ?species
    {
        return $this->species;
    }

    public function setSpecies(?species $species): static
    {
        $this->species = $species;

        return $this;
    }

    /**
     * @return Collection<int, vetreport>
     */
    public function getVetReport(): Collection
    {
        return $this->vetReport;
    }

    public function addVetReport(vetreport $vetReport): static
    {
        if (!$this->vetReport->contains($vetReport)) {
            $this->vetReport->add($vetReport);
            $vetReport->setAnimal($this);
        }

        return $this;
    }

    public function removeVetReport(vetreport $vetReport): static
    {
        if ($this->vetReport->removeElement($vetReport)) {
            // set the owning side to null (unless already changed)
            if ($vetReport->getAnimal() === $this) {
                $vetReport->setAnimal(null);
            }
        }

        return $this;
    }
}