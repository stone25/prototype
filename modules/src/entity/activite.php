<?php 

class Activite
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $denomination;
    private $description;
    private $date;
    private $lieu;
    private $photo;

/*------------------------------------------
Constructeur de la classe ---------------------
-------------------------------------------*/

    function __construct()
    {

    }

/*------------------------------------------
setter de la classe ---------------------
-------------------------------------------*/
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


/*------------------------------------------
getter de la classe ---------------------
-------------------------------------------*/
    public function getId()
    {
        return $this->id;
    }

    public function getDenomination()
    {
        return $this->denomination;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerActivite()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d");
            $query = "INSERT INTO activite(den_act, desc_act, date_act, lieu_act, photo_act) VALUES ('$this->denomination','$this->description','$this->date','$this->lieu','$this->photo')";
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
    public function modifierActivite()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE activite SET den_act = '$this->denomination', desc_act = '$this->description', date_act = '$this->date', lieu_act = '$this->lieu', photo_act = '$this->photo' WHERE id_act = $this->id";
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

//Suppression
    public function supprimerActivite()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE article SET stat_art = '$this->statut' WHERE id_art = $this->id";
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
?>