<?php

namespace App\Entity;

use App\Repository\BienImmobilierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BienImmobilierRepository::class)
 */
class BienImmobilier
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $numImmo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaire::class, inversedBy="bienImmos")
     * @ORM\JoinColumn(nullable=true, referencedColumnName="num_prop")
     */
    private $yes;

    /**
     * @return mixed
     */
    public function getNumImmo()
    {
        return $this->numImmo;
    }

    /**
     * @param mixed $numImmo
     */
    public function setNumImmo($numImmo): void
    {
        $this->numImmo = $numImmo;
    }



    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getYes(): ?Proprietaire
    {
        return $this->yes;
    }

    public function setYes(?Proprietaire $yes): self
    {
        $this->yes = $yes;

        return $this;
    }
}
