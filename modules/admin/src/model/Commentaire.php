<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="I_FK_COMMENTAIRE_JECISTE", columns={"ID_JECISTE"}), @ORM\Index(name="I_FK_COMMENTAIRE_PUBLICATION", columns={"ID_PUBLICATION"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @var int
     *
     * @ORM\Column(name="ID_PUBLICATION", type="integer", nullable=false)
     */
    private $idPublication;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATES", type="date", nullable=true)
     */
    private $dates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HEURE", type="string", length=8, nullable=true)
     */
    private $heure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TEXTE", type="string", length=200, nullable=true)
     */
    private $texte;

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

    public function getIdPublication(): ?int
    {
        return $this->idPublication;
    }

    public function setIdPublication(int $idPublication): self
    {
        $this->idPublication = $idPublication;

        return $this;
    }

    public function getDates(): ?\DateTimeInterface
    {
        return $this->dates;
    }

    public function setDates(?\DateTimeInterface $dates): self
    {
        $this->dates = $dates;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(?string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }


}
