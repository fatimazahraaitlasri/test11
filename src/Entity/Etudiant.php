<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Cin;

    /**
     * @ORM\ManyToOne(targetEntity=filier::class, inversedBy="etudiants")
     */
    private $filier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->Cin;
    }

    public function setCin(string $Cin): self
    {
        $this->Cin = $Cin;

        return $this;
    }

    public function getFilier(): ?filier
    {
        return $this->filier;
    }

    public function setFilier(?filier $filier): self
    {
        $this->filier = $filier;

        return $this;
    }
}
