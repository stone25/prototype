<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aumonerie
 *
 * @ORM\Table(name="aumonerie", indexes={@ORM\Index(name="I_FK_A_AUMONIER", columns={"ID_AUMONIER"}), @ORM\Index(name="I_FK_A_ANNEE_PASTORALE", columns={"ID_ANNEE"}), @ORM\Index(name="I_FK_A_INSTANCE", columns={"ID_INSTANCE"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AumonerieRepository")
 */
class Aumonerie
{
    /**
     * @var \Aumonier
     *
     * @ORM\Id
     * 
     * @ORM\ManyToOne(targetEntity="Aumonier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aumonier", referencedColumnName="ID")
     * })
     */
    private $idAumonier;

    /**
     * @var \AnneePastorale
     *
     * @ORM\Id  
     * 
     * @ORM\ManyToOne(targetEntity="AnneePastorale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_annee", referencedColumnName="ID")
     * })
     */
    private $idAnnee;

    /**
     * @var \Instance
     *
     * @ORM\Id
     * 
     * @ORM\ManyToOne(targetEntity="Instance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_instance", referencedColumnName="ID")
     * })
     */
    private $idInstance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAROISSE", type="string", length=50, nullable=true)
     */
    private $paroisse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FONCTION", type="string", length=32, nullable=true)
     */
    private $fonction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STATUT", type="string", length=50, nullable=true)
     */
    private $statut;
    

    public function getIdAumonier(): ?Aumonier
    {
        return $this->idAumonier;
    }

    public function setIdAumonier(?Aumonier $aumonier): self
    {
        $this->idAumonier = $aumonier;

        return $this;
    }

    public function getIdAnnee(): ?AnneePastorale
    {
        return $this->idAnnee;
    }

    public function setIdAnnee(?AnneePastorale $annee): self
    {
        $this->idAnnee = $annee;

        return $this;
    }

    public function getIdInstance(): ?Instance
    {
        return $this->idInstance;
    }

    public function setIdInstance(?Instance $instance): self
    {
        $this->idInstance = $instance;

        return $this;
    }

    public function getParoisse(): ?string
    {
        return $this->paroisse;
    }

    public function setParoisse(?string $paroisse): self
    {
        $this->paroisse = $paroisse;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }


}
