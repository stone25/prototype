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

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerInstance()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "INSERT INTO instance(denomination, type, localisation, iddiocese) VALUES ('$this->denomination','$this->type','$this->localisation','$this->iddiocese')";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
    }

//Modification
    public function modifierInstance()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE instance SET denomination = '$this->denomination', type = '$this->type', localisation = '$this->localisation', iddiocese = '$this->iddiocese' WHERE id = $this->id";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

//suppression
    public function supprimerInstance()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "DELETE FROM instance  WHERE id = $this->id";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }


}
