<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $Day = null;

    #[ORM\Column(length: 5)]
    private ?string $Open = null;

    #[ORM\Column(length: 5)]
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
