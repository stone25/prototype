<?php
    session_start();
    include_once('../../entity/Connexion.php'); 
    include_once('../../entity/Jeciste.php'); 
    include_once('../../entity/Militer.php'); 

    $connexion = new Connexion();

/******************************************
 * modification d'un membre
 *****************************************/
    if(isset($_POST["modifierJeciste"]))
    {
        $_POST["nom"] = str_replace("'","''", $_POST["nom"]);
        $_POST["prenom"] = str_replace("'","''", $_POST["prenom"]);
        $_POST["lieu"] = str_replace("'","''", $_POST["lieu"]);

        $membre = new Membre();
        $membre->setNom($_POST["nom"]);
        $membre->setPrenom($_POST["prenom"]);
        $membre->setDate($_POST["date"]);
        $membre->setLieu($_POST["lieu"]);
        $membre->setContact($_POST["contact"]);
        $membre->setEmail($_POST["email"]);
        $membre->setMatricule($_POST["matricule"]);
        $membre->setSang($_POST["sang"]);
        $membre->setCni($_POST["cni"]);
        $membre->setSexe($_POST["sexe"]);
        $matricule = $membre->getMatricule();

        if(isset($_SESSION["photo"]["$matricule"]))
        {
            $test = explode('.', $_POST["filename"]);
            $ext = end($test);
            $photo = $membre->getMatricule() . '.' . $ext;
            $query = "update jeciste set nom = '".$membre->getNom()."', prenom = '".$membre->getPrenom()."', date = '".$membre->getDate()."', lieu = '".$membre->getLieu()."', contact = '".$membre->getContact()."', email = '".$membre->getEmail()."', photo = '".$photo."', sexe = '".$membre->getSexe()."', sang = '".$membre->getSang()."', cni = '".$membre->getCni()."', matricule = '".$membre->getMatricule()."' where id = $_GET[id]";
            unset($_SESSION["photo"]["$matricule"]);
        }
        else
        {
            $query = "update jeciste set nom = '".$membre->getNom()."', prenom = '".$membre->getPrenom()."', date = '".$membre->getDate()."', lieu = '".$membre->getLieu()."', contact = '".$membre->getContact()."', email = '".$membre->getEmail()."', sexe = '".$membre->getSexe()."', sang = '".$membre->getSang()."', cni = '".$membre->getCni()."', matricule = '".$membre->getMatricule()."' where id = $_GET[id]";
        }
        
        mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../jeciste.php'>";
    }

/******************************************
 * ajout d'un membre
 *****************************************/
if(isset($_POST["add-jeciste"]))
{
    $nom= str_replace("'","''", $_POST["nom"]);
    $prenom = str_replace("'","''", $_POST["prenom"]);
    $lieu = str_replace("'","''", $_POST["lieu"]);
    

    $req = "SELECT id,COUNT(*) AS cpt FROM jeciste WHERE nom = '$nom' AND prenom = '$prenom' AND date = '$_POST[date]' AND lieu = '$lieu' GROUP BY id";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $verif=mysqli_fetch_assoc($fic);

    if($verif['cpt']>0)
    {
        $_SESSION['user']["id"] = $verif["id"];
        $i =$_SESSION['user']["id"];
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/erreur.php?id=$i'>";
    }
    else
    {    
        $req = "SHOW TABLE STATUS FROM jecci1157367 LIKE 'jeciste'";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        
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
            $matricule = $year.'COM000'.$row['Auto_increment'];
        }
        else if(strlen($row['Auto_increment'])==2)
        {
            $matricule = $year.'COM00'.$row['Auto_increment'];
        }
        else if(strlen($row['Auto_increment'])==3)
        {
            $matricule = $year.'COM0'.$row['Auto_increment'];
        }
        else 
        {
            $matricule = $year.'COM'.$row['Auto_increment'];
        }

        $_POST["nom"] = str_replace("'","''", $_POST["nom"]);
        $_POST["prenom"] = str_replace("'","''", $_POST["prenom"]);
        $_POST["lieu"] = str_replace("'","''", $_POST["lieu"]);
        $_POST["poste"] = str_replace("'","''", $_POST["poste"]);

        $membre = new Membre();
        $membre->setNom($_POST["nom"]);
        $membre->setPrenom($_POST["prenom"]);
        $membre->setDate($_POST["date"]);
        $membre->setLieu($_POST["lieu"]);
        $membre->setContact($_POST["contact"]);
        $membre->setEmail($_POST["email"]);
        $membre->setMatricule($matricule.$_POST["sexe"]);
        $membre->setSang($_POST["sang"]);
        $membre->setCni($_POST["cni"]);
        $membre->setSexe($_POST["sexe"]);

        $name='';
        if($_FILES["file"]["name"] != '')
        {
            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = $membre->getMatricule().'.'. $ext;
            $location = '../../../admin/img/jeciste/' . $name;  
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            $membre->setPhoto($name);
        }
        else
        {
            if($membre->getSexe($name)=='F')
            {
                $membre->setPhoto('defaut-femme.jpg');
            }
            else
            {
                $membre->setPhoto('defaut-homme.jpg');
            }
        }

        
        if($membre->creerJeciste())
        {
            $_SESSION['matricule']=$matricule.$_POST["sexe"];
            $req = "select * from annee_pastorale where statut = 'active'";
            $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
            $annee=mysqli_fetch_assoc($fic);

            $req = "select * from jeciste where matricule = '".$membre->getMatricule()."'";
            $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
            $jeciste=mysqli_fetch_assoc($fic);

            $militer = new Militer();
            $militer->setIdInstance($_SESSION["instance"]);
            $militer->setIdAnnee($annee['id']);
            $militer->setIdJeciste($jeciste["id"]);
            $militer->setStatut($_POST["poste"]);

            $militer->creerMiliter();

            $type = $_POST["poste"];
            if($type!='Membre')
            {
                $req = "SELECT * from instance WHERE id = $_SESSION[instance]";
                $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                $row=mysqli_fetch_assoc($fic);
                $type = $row["type"];
            }

            $query = "INSERT INTO utilisateur(idjeciste, password, type, statut) VALUES ('$jeciste[id]','JEC2019','$type','Non-payée')";
            $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));

            $_SESSION['user']["id"] = $jeciste["id"];
        }
        
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/resultat.php'>";
    }
}

/******************************************
 *  Ajout militantisme
 *****************************************/
if(isset($_POST['ajout-militer']))
{
    $req = "SELECT * FROM annee_pastorale WHERE statut = 'active'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $annee=mysqli_fetch_assoc($fic);

    $req = "SELECT * FROM jeciste WHERE id = $_GET[id]";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $jeciste=mysqli_fetch_assoc($fic);

    $_POST["responsabilite"] = str_replace("'","''", $_POST["responsabilite"]);

    $militer = new Militer();
    $militer->setIdInstance($_POST["instance"]);
    $militer->setIdAnnee($annee['id']);
    $militer->setIdJeciste($jeciste["id"]);
    $militer->setStatut($_POST["responsabilite"]);
    $militer->creerMiliter();

    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/detail-jeciste.php?id=$jeciste[id]'>";
}


/******************************************
 *  Selection du diocese
 *****************************************/
    if(isset($_POST['select-diocese']))
    {
        $_SESSION['diocese']=$_POST['diocese'];
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/instance.php'>";
    }

/******************************************
 *  Selection du instance
 *****************************************/
    if(isset($_POST['select-instance']))
    {
        $_SESSION['instance']=$_POST['instance'];
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/inscription.php'>";
    }

/******************************************
 *  Verification d'inscription
 *****************************************/
    if(isset($_POST['verification']))
    {
        $query = "SELECT * FROM jeciste INNER JOIN militer ON jeciste.id = militer.idjeciste INNER JOIN instance ON instance.id = militer.idinstance WHERE jeciste.matricule = '$_POST[matricule]'";
        $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
        $totalRows = mysqli_num_rows($result);
        $jeciste = mysqli_fetch_assoc($result);
        
        if($totalRows==1)
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/verification.php?matricule=$_POST[matricule]'>";
        }
        else if($totalRows>1)
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/verification.php?error=1'>";
        }
        else
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../inscription/verification.php?error=2'>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Traitement...</title>

        <!-- Favicon  -->
        <link rel="icon" href="../../img/favicon.ico">

        <!-- Custom CSS -->
        <link href="../style/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>
