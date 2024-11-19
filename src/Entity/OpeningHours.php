<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    #[Assert\NotBlank(message: "Le jour est obligatoire.")]
    #[Assert\Choice(
        choices: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
        message: "Veuillez choisir un jour valide."
    )]
    private ?string $Day = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank(message: "L'heure d'ouverture est obligatoire.")]
    #[Assert\Regex(
        pattern: "/^([01][0-9]|2[0-3]):[0-5][0-9]$/",
        message: "L'heure d'ouverture doit être au format HH:MM."
    )]
    private ?string $Open = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank(message: "L'heure de fermeture est obligatoire.")]
    #[Assert\Regex(
        pattern: "/^([01][0-9]|2[0-3]):[0-5][0-9]$/",
        message: "L'heure de fermeture doit être au format HH:MM."
    )]
    private ?string $Close = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->Day;
    }

    public function setDay(string $Day): static
    {
        $this->Day = $Day;

        return $this;
    }
    public function getOpen(): ?string
    {
        return $this->Open;
    }

    public function setOpen(string $Open): static
    {
        $this->Open = $Open;

        return $this;
    }

    public function getClose(): ?string
    {
        return $this->Close;
    }

    public function setClose(string $Close): static
    {
        $this->Close = $Close;

        return $this;
    }
    
}
