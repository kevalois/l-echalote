<?php

namespace App\Entity;

use App\Repository\AlerteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlerteRepository::class)
 */
class Alerte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $alerte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif = false;

    public function __toString()
{
    return $this->alerte;
}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlerte(): ?string
    {
        return $this->alerte;
    }

    public function setAlerte(?string $alerte): self
    {
        $this->alerte = $alerte;

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
}
