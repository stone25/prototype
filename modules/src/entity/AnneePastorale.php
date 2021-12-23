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

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerAnnee()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "INSERT INTO annee_pastorale(libelle, type, debut, fin, statut) VALUES ('$this->libelle','$this->type','$this->debut','$this->fin','$this->statut')";
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
    public function modifierAnnee()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE annee_pastorale SET libelle = '$this->libelle', type = '$this->type', debut = '$this->debut', fin = '$this->fin', sexe = '$this->statut' WHERE id = $this->id";
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
    public function supprimerProjet()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "DELETE FROM annee_pastorale  WHERE id = $this->id";
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
