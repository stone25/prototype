<?php

class AnneePastorale
{
    private $id;
    private $libelle;
    private $type;
    private $debut;
    private $fin;
    private $statut;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getDebut()
    {
        return $this->debut;
    }

    public function setDebut($debut)
    {
        $this->debut = $debut;
        return $this;
    }

    public function getFin()
    {
        return $this->fin;
    }

    public function setFin($fin)
    {
        $this->fin = $fin;
        return $this;
    }


    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($fin)
    {
        $this->statut = $statut;
        return $this;
    }


}
