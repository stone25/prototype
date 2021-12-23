<?php 

class Photo
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $titre;
    private $nom;
    private $description;
    private $etat;
    private $activite;

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

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function setActivite($activite)
    {
        $this->activite = $activite;
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

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getActivite()
    {
        return $this->activite;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function ajouterPhoto()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO photo(titre_photo, nom_photo, desc_photo, etat_photo, id_act) VALUES ('$this->titre','$this->nom','$this->description','$this->etat',$this->activite)";
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
    public function changerEtat()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE photo SET etat_photo = '$this->etat' WHERE id_photo = $this->id";
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

    public function modifierPhoto()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE photo SET titre_photo = '$this->titre', nom_photo = '$this->nom', etat_photo = '$this->etat', desc_photo = '$this->description' WHERE id_photo = $this->id";
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
    public function supprimerPhoto()
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