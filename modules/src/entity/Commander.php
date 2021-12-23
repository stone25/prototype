<?php
class Commander
{
    private $idCommande;
    private $idAnnee;
    private $idJeciste;
    private $date;

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function getIdAnnee()
    {
        return $this->idAnnee;
    }

    public function getIdJeciste()
    {
        return $this->idJeciste;
    }

    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

    //Création
    public function creerCommander()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date('Y-m-d');
            $query = "INSERT INTO commander(idcommande, idannee, idjeciste, date) VALUES ('$this->idCommande','$this->idAnnee','$this->idJeciste','$date')";
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

    //Annulation
    public function supprimerCommander()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "DELETE FROM commander  WHERE idjeciste = $this->idJeciste";
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
