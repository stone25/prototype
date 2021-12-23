<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Courrier
 *
 * @ORM\Table(name="courrier", indexes={@ORM\Index(name="I_FK_COURRIER_INSTANCE", columns={"ID_RECEPTEUR"}), @ORM\Index(name="I_FK_COURRIER_INSTANCE1", columns={"ID_EXPEDIDITEUR"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CourrierRepository")
 */
class Courrier
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
     *   @ORM\JoinColumn(name="ID_RECEPTEUR", referencedColumnName="ID")
     * })
     */
    private $idRecepteur;

    /**
     * @var \Instance
     * 
     * @ORM\ManyToOne(targetEntity="Instance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EXPEDITEUR", referencedColumnName="ID")
     * })
     */
    private $idExpediteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NREF", type="string", length=20, nullable=true)
     */
    private $nref;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VREF", type="string", length=20, nullable=true)
     */
    private $vref;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATES", type="date", nullable=true)
     */
    private $dates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="OBJET", type="string", length=20, nullable=true)
     */
    private $objet;

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

    public function getIdRecepteur(): ?Instance
    {
        return $this->idRecepteur;
    }

    public function setIdRecepteur(Instance $idRecepteur): self
    {
        $this->idRecepteur = $idRecepteur;

        return $this;
    }

    public function getIdExpediteur(): ?Instance
    {
        return $this->idExpediditeur;
    }

    public function setIdExpediteur(Instance $idExpediteur): self
    {
        $this->idExpediteur = $idExpediteur;

        return $this;
    }

    public function getNref(): ?string
    {
        return $this->nref;
    }

    public function setNref(?string $nref): self
    {
        $this->nref = $nref;

        return $this;
    }

    public function getVref(): ?string
    {
        return $this->vref;
    }

    public function setVref(?string $vref): self
    {
        $this->vref = $vref;

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

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(?string $objet): self
    {
        $this->objet = $objet;

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
