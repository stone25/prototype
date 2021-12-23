<?php

class Membre
{
    private $id;
    private $nom;
    private $prenom;
    private $date;
    private $lieu;
    private $contact;
    private $email;
    private $photo;
    private $sexe;
    private $sang;
    private $cni;
    private $matricule;
    

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

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

    public function getLieu()
    {
        return $this->lieu;
    }

    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getCni()
    {
        return $this->cni;
    }

    public function setCni($cni)
    {
        $this->cni = $cni;

        return $this;
    }

    public function getSang()
    {
        return $this->sang;
    }

    public function setSang($sang)
    {
        $this->sang = $sang;

        return $this;
    }

    public function getMatricule()
    {
        return $this->matricule;
    }

    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

/*------------------------------------------
Méthode de la classe -----------------------
-------------------------------------------*/

//Création
    public function creerJeciste()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO jeciste(matricule, nom, prenom, date, lieu, sexe, contact, email, cni, sang, photo) VALUES ('$this->matricule','$this->nom','$this->prenom','$this->date','$this->lieu','$this->sexe','$this->contact','$this->email','$this->sang','$this->cni','$this->photo')";
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
    public function modifierJeciste()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE jeciste SET nom = '$this->nom', prenom = '$this->prenom', date = '$this->date', lieu = '$this->lieu', sexe = '$this->sexe', contact = '$this->contact', email = '$this->email', sang = '$this->sang', cni = '$this->cni'  WHERE id = $this->id";
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
            $query = "DELETE FROM jeciste  WHERE id = $this->id";
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

//attribution de matricule
    public function attribuerMatricule()
    {
        $connexion = new Connexion();

        if($connexion->connecter())
        {
            $query = "UPDATE jeciste SET matricule = '$this->matricule'  WHERE id = $this->id";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            $query = "UPDATE utilisateur SET statut = 'Nouveau'  WHERE idjeciste = $this->id";
            $result1 = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            if($result && $result1)
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
