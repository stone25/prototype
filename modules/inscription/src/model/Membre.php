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

//attribution de matricule
    public function attriberMatricule()
    {
        $month = date('m');
        if($month>=9)
        {
            $year = date('y') ;
        }
        else
        {
            $year = date('y')-1;
        }
        
        $row=mysqli_fetch_assoc($fic);
        if(strlen($row['Auto_increment'])==1)
        {
            $matricule = $year.'JEC-CI000'.$membre->getSexe($name);
        }
        else if(strlen($row['Auto_increment'])==2)
        {
            $matricule = $year.'JEC-CI00'.$row['Auto_increment'];
        }
        else if(strlen($row['Auto_increment'])==3)
        {
            $matricule = $year.'JEC-CI0'.$row['Auto_increment'];
        }
        else 
        {
            $matricule = $year.'JEC-CI'.$row['Auto_increment'];
        }
    }
}
