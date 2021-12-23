<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aumonier
 *
 * @ORM\Table(name="aumonier")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AumonierRepository")
 */
class Aumonier
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
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONTACT", type="string", length=8, nullable=true)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EMAIL", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SACERDOCE", type="string", length=10, nullable=true)
     */
    private $sacerdoce;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOGIN", type="string", length=20, nullable=true)
     */
    private $login;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MDP", type="string", length=20, nullable=true)
     */
    private $mdp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSacerdoce(): ?string
    {
        return $this->sacerdoce;
    }

    public function setSacerdoce(?string $sacerdoce): self
    {
        $this->sacerdoce = $sacerdoce;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }


}
