<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="I_FK_PUBLICATION_ACTIVITE", columns={"ID_ACTIVITE"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PublicationRepository")
 */
class Publication
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
     * @var \Activite
     *
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ACTIVITE", referencedColumnName="ID")
     * })
     */
    private $idActivite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MESSAGE", type="string", length=200, nullable=true)
     */
    private $message;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMAGE", type="string", length=400, nullable=true)
     */
    private $image;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATES", type="date", nullable=true)
     */
    private $dates;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdActivite(): ?Activite
    {
        return $this->idActivite;
    }

    public function setIdActivite(Activite $idActivite): self
    {
        $this->idActivite = $idActivite;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

}
