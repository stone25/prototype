<?php
class Militer
{
    private $idInstance;
    private $idAnnee;
    private $idJeciste;
    private $statut;

    public function getIdInstance()
    {
        return $this->idInstance;
    }

    public function getIdAnnee()
    {
        return $this->idAnnee;
    }

    public function getIdJeciste()
    {
        return $this->idJeciste;
    }

    public function setIdInstance($idInstance)
    {
        $this->idInstance = $idInstance;
        return $this;
    }

    public function setIdAnnee($idAnnee)
    {
        $this->idAnnee = $idAnnee;
        return $this;
    }

    public function setIdJeciste($idjeciste)
    {
        $this->idJeciste = $idjeciste;
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

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

    //Création
    public function creerMiliter()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "INSERT INTO militer(idinstance, idannee, idjeciste, statut) VALUES ('$this->idInstance','$this->idAnnee','$this->idJeciste','$this->statut')";
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
