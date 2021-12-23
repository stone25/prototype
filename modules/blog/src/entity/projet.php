<?php 

class Projet
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $denomination;
    private $description;
    private $categorie;
    private $lieu;
    private $debut;
    private $fin;
    private $photo1;
    private $photo2;
    private $photo3;
    private $photo4;
    private $photo5;
    private $responsable;
    private $client;
    private $appreciation;

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

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    public function setDebut($debut)
    {
        $this->debut = $debut;
    }

    public function setFin($fin)
    {
        $this->fin = $fin;
    }

    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;
    }

    public function setPhoto4($photo4)
    {
        $this->photo4 = $photo4;
    }

    public function setPhoto5($photo5)
    {
        $this->photo5 = $photo5;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;
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

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function getDebut()
    {
        return $this->debut;
    }

    public function getFin()
    {
        return $this->fin;
    }

    public function getPhoto1()
    {
        return $this->photo1;
    }

    public function getPhoto2()
    {
        return $this->photo2;
    }

    public function getPhoto3()
    {
        return $this->photo3;
    }

    public function getPhoto4()
    {
        return $this->photo4;
    }

    public function getPhoto5()
    {
        return $this->photo5;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getAppreciation()
    {
        return $this->appreciation;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerProjet()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO projet(den_pro, desc_pro, cat_pro, lieu_pro, deb_pro, fin_pro, photo1_pro, photo2_pro, photo3_pro, photo4_pro, photo5_pro, respo_pro, clt_pro, appr_pro) VALUES ('$this->denomination','$this->description','$this->categorie','$this->lieu','$this->debut','$this->fin','$this->photo1','$this->photo2','$this->photo3','$this->photo4','$this->photo5','$this->responsable','$this->client','$this->appreciation')";
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
    public function modifierProjet()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE projet SET den_pro = '$this->denomination', desc_pro = '$this->description', cat_pro = '$this->categorie', lieu_pro = '$this->lieu', deb_pro = '$this->debut', fin_pro = '$this->fin', respo_pro = '$this->responsable', clt_pro = '$this->client', appr_pro = '$this->appreciation'  WHERE id_pro = $this->id";
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