<?php 

class Article
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $titre;
    private $contenu1;
    private $contenu2;
    private $citation;
    private $auteur;
    private $photo1;
    private $photo2;
    private $date;
    private $vue;
    private $statut;
    private $redacteur;

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

    public function setContenu1($contenu1)
    {
        $this->contenu1 = $contenu1;
    }

    public function setContenu2($contenu2)
    {
        $this->contenu2 = $contenu2;
    }

    public function setCitation($citation)
    {
        $this->citation = $citation;
    }

    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setVue($vue)
    {
        $this->vue = $vue;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function setRedacteur($redacteur)
    {
        $this->redacteur = $redacteur;
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

    public function getContenu1()
    {
        return $this->contenu1;
    }

    public function getContenu2()
    {
        return $this->contenu2;
    }

    public function getCitation()
    {
        return $this->citation;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function getPhoto1()
    {
        return $this->photo1;
    }

    public function getPhoto2()
    {
        return $this->photo2;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getVue()
    {
        return $this->vue;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getRedacteur()
    {
        return $this->redacteur;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerArticle()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO article(titre_art, cont1_art, cont2_art, cit_art, aut_art, photo1_art, photo2_art, date_art, vue_art, stat_art, id_user) VALUES ('$this->titre','$this->contenu1','$this->contenu2','$this->citation','$this->auteur','$this->photo1','$this->photo2','$date',0,'Invisible',$this->redacteur)";
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
    public function modifierArticle()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "UPDATE article SET titre_art = '$this->titre', cont1_art = '$this->contenu1', cont2_art = '$this->contenu2', cit_art = '$this->citation', aut_art = '$this->auteur', photo1_art = '$this->photo1', photo2_art = '$this->photo2', date_art = '$date' WHERE id_art = $this->id";
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

//Statut de l'article
    public function changerVisibilite()
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

//vue de l'article
    public function ajouterVue()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE article SET vue_art = vue_art+1 WHERE id_art = $this->id";
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