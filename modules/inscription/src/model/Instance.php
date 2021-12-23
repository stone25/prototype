<?php

class Instance
{
    private $id;
    private $denomination;
    private $type;
    private $localisation;
    private $iddiocese;

    public function getId()
    {
        return $this->id;
    }

    public function getDenomination()
    {
        return $this->denomination;
    }

    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

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

    public function getLocalisation()
    {
        return $this->localisation;
    }

    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getIddiocese()
    {
        return $this->iddiocese;
    }

    public function setIddiocese($iddiocese)
    {
        $this->iddiocese = $iddiocese;

        return $this;
    }

}
