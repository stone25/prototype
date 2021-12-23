<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite", indexes={@ORM\Index(name="I_FK_ACTIVITE_INSTANCE", columns={"ID_ORGANISER"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 */
class Activite
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
     * @var \Instance
     *
     * @ORM\ManyToOne(targetEntity="Instance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_INSTANCE", referencedColumnName="ID")
     * })
     */
    private $idInstance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=40, nullable=true)
     */
    private $nom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DEBUT", type="date", nullable=true)
     */
    private $debut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FIN", type="date", nullable=true)
     */
    private $fin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LIEU", type="string", length=50, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRIX", type="string", length=50, nullable=true)
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdInstance(): ?Instance
    {
        return $this->idInstance;
    }

    public function setIdInstance(Instance $idinstance): self
    {
        $this->idInstance = $idinstance;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(?\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }


    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }



}
