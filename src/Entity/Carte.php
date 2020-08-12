<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 */
class Carte
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
    private $categorie;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif = true;

    /**
     * @ORM\OneToMany(targetEntity=Gulp::class, mappedBy="carte")
     */
    private $gulps;

    /**
     * @Gedmo\Slug(fields={"categorie"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Aliment::class, inversedBy="cartes")
     */
    private $aliments;

    public function __construct()
    {
        $this->gulps = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->categorie;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection|Gulp[]
     */
    public function getGulps(): Collection
    {
        return $this->gulps;
    }

    public function addGulp(Gulp $gulp): self
    {
        if (!$this->gulps->contains($gulp)) {
            $this->gulps[] = $gulp;
            $gulp->setCarte($this);
        }

        return $this;
    }

    public function removeGulp(Gulp $gulp): self
    {
        if ($this->gulps->contains($gulp)) {
            $this->gulps->removeElement($gulp);
            // set the owning side to null (unless already changed)
            if ($gulp->getCarte() === $this) {
                $gulp->setCarte(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getAliments(): ?Aliment
    {
        return $this->aliments;
    }

    public function setAliments(?Aliment $aliments): self
    {
        $this->aliments = $aliments;

        return $this;
    }
}
