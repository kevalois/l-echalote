<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 */
class Aliment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_aliment;

    /**
     * @Gedmo\Slug(fields={"type_aliment"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Carte::class, mappedBy="aliments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartes;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->type_aliment;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAliment(): ?string
    {
        return $this->type_aliment;
    }

    public function setTypeAliment(string $type_aliment): self
    {
        $this->type_aliment = $type_aliment;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return Collection|Carte[]
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes[] = $carte;
            $carte->setAliments($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->contains($carte)) {
            $this->cartes->removeElement($carte);
            // set the owning side to null (unless already changed)
            if ($carte->getAliments() === $this) {
                $carte->setAliments(null);
            }
        }

        return $this;
    }
}
