<?php 
include_once('connexion.php'); 

class Blogueur
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    private $id;
    private $nom;
    private $prenom;
    private $date;
    private $lieu;
    private $contact;
    private $email;
    private $fonction;
    private $photo;
    private $login;
    private $password;

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

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFonction($fonction)
    {
        $this->fonction = $fonction;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

/*------------------------------------------
getter de la classe ---------------------
-------------------------------------------*/
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getLieu()
    {
        return $this->lieu;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFonction()
    {
        return $this->fonction;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerUser()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "INSERT INTO blogueur(nom_user, pren_user, date_user, lieu_user, cont_user, email_user, fonc_user, photo_user, login_user, pwd_user) VALUES ('$this->nom','$this->prenom','$this->date','$this->lieu','$this->contact','$this->email','$this->fonction','$this->photo','$this->login','$this->password')";
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
public function modifierUser()
{
    $connexion = new Connexion();

    if($connexion->connecter())
    {
        $query = "UPDATE blogueur SET nom_user = '$this->nom', pren_user = '$this->prenom', date_user = '$this->date', lieu_user = '$this->lieu', cont_user = '$this->contact', email_user = '$this->email', fonc_user = '$this->fonction', login_user = '$this->login', pwd_user = '$this->password' WHERE id_user = $this->id";
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

//Authentification
    public function authentifier()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "SELECT COUNT(*) AS cpt FROM blogueur WHERE login_user = '$this->login' AND pwd_user = '$this->password'";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
            $nombre = mysqli_fetch_assoc($result);

            if($nombre['cpt']==1)
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