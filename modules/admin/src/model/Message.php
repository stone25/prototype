<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="I_FK_MESSAGE_JECISTE", columns={"ID_RECEPTEUR"}), @ORM\Index(name="I_FK_MESSAGE_JECISTE1", columns={"ID_EMETTEUR"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="ID_RECEPTEUR", type="integer", nullable=false)
     */
    private $idRecepteur;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_EMETTEUR", type="integer", nullable=false)
     */
    private $idEmetteur;

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
     * @ORM\Column(name="CONTENU", type="string", length=200, nullable=true)
     */
    private $contenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRecepteur(): ?int
    {
        return $this->idRecepteur;
    }

    public function setIdRecepteur(int $idRecepteur): self
    {
        $this->idRecepteur = $idRecepteur;

        return $this;
    }

    public function getIdEmetteur(): ?int
    {
        return $this->idEmetteur;
    }

    public function setIdEmetteur(int $idEmetteur): self
    {
        $this->idEmetteur = $idEmetteur;

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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }


}
