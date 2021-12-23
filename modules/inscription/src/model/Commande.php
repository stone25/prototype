<?php

class Instance
{
    private $id;
    private $numero;
    private $creation;
    private $production;
    private $statut;
    private $idjeciste;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCreation()
    {
        return $this->creation;
    }

    public function setCreation($creation)
    {
        $this->creation = $creation;

        return $this;
    }

    public function getProduction()
    {
        return $this->production;
    }

    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdjeciste()
    {
        return $this->idjeciste;
    }

    public function setIdjeciste($idjeciste)
    {
        $this->idjeciste = $idjeciste;

        return $this;
    }


/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerCommande()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "INSERT INTO commande(numero, creation, statut, idjeciste) VALUES ('$this->numero','$this->creation','$this->statut','$this->idjeciste')";
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
    public function produireCommande()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE commande SET production = '$this->production', statut = '$this->statut' WHERE id = $this->id";
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
            $query = "DELETE FROM commande  WHERE id = $this->id";
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
