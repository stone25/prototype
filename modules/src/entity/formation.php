<?php 

class Formation
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $titre;
    private $description;
    private $type;
    private $date;
    private $auteur;

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

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }


/*------------------------------------------
getter de la classe ---------------------
-------------------------------------------*/
    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerFormation()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d");
            $query = "INSERT INTO formation(titre, description, type, date, auteur) VALUES ('$this->titre','$this->description', '$this->type','$this->date','$this->auteur')";
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
    public function modifierFormation()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE formation SET titre = '$this->titre', description = '$this->description', type = '$this->type' WHERE id = $this->id";
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
    public function supprimerFormation()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "DELETE FROM formation WHERE id = $this->id";
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