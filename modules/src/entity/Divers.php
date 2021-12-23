<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Divers
 *
 * @ORM\Table(name="divers", indexes={@ORM\Index(name="I_FK_DIVERS_JECISTE", columns={"ID_JECISTE"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\DiversRepository")
 */
class Divers
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_JECISTE", type="integer", nullable=false)
     */
    private $idJeciste;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=32, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="TEXTE", type="string", length=300, nullable=false)
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATES", type="date", nullable=false)
     */
    private $dates;

    /**
     * @var string
     *
     * @ORM\Column(name="HEURE", type="string", length=8, nullable=false)
     */
    private $heure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJeciste(): ?int
    {
        return $this->idJeciste;
    }

    public function setIdJeciste(int $idJeciste): self
    {
        $this->idJeciste = $idJeciste;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function setDates(\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }


}
