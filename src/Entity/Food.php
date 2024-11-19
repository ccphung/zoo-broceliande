<?php

namespace App\Entity;

use App\Repository\FoodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FoodRepository::class)]
class Food
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom de la nourriture est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de la nourriture ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $name = null;

    /**
     * @var Collection<int, Feed>
     */
    #[ORM\OneToMany(targetEntity: Feed::class, mappedBy: 'food')]
    private Collection $feeds;

    public function __construct()
    {
        $this->feeds = new ArrayCollection();
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

    /**
     * @return Collection<int, Feed>
     */
    public function getFeeds(): Collection
    {
        return $this->feeds;
    }

    public function addFeed(Feed $feed): static
    {
        if (!$this->feeds->contains($feed)) {
            $this->feeds->add($feed);
            $feed->setFood($this);
        }

        return $this;
    }

    public function removeFeed(Feed $feed): static
    {
        if ($this->feeds->removeElement($feed)) {
            // set the owning side to null (unless already changed)
            if ($feed->getFood() === $this) {
                $feed->setFood(null);
            }
        }

        return $this;
    }

    
    public function __toString()
    {
        return $this->name;
    }
}
