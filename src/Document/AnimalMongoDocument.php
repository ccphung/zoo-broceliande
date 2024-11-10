<?php

namespace App\Document;

class AnimalMongoDocument
{
    private $id;
    private $animalName;
    private $clickCount=0;

    public function getId(): ?string
    {
        return $this->id;
    }

    
    public function setId(string $id): self
    {
         $this->id = $id;

         return $this;
    }

    public function getAnimalName(): ?string
    {
        return $this->animalName;
    }

    public function setAnimalName(string $animalName): self
    {
        $this->animalName = $animalName;

        return $this;
    }

    public function getClickCount(): ?int
    {
        return $this->clickCount;
    }

    public function setClickCount(?int $clickCount): self
    {
        $this->clickCount = $clickCount;

        return $this;
    }
}
