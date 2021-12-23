<?php
    session_start();
    include_once('connexion.php'); 
    include_once('../model/Membre.php'); 
    include_once('../model/Militer.php'); 

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
        
        mysqli_query($connexion, $query) or die(mysqli_error($connexion));

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../jeciste.php'>";
    }

/******************************************
 * ajout d'un membre
 *****************************************/
if(isset($_POST["add-jeciste"]))
{
    $req = "SHOW TABLE STATUS FROM jecci1157367 LIKE 'jeciste' ";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    
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
        $matricule = $year.'JEC-CI000'.$row['Auto_increment'];
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

    $query = "insert into jeciste(nom, prenom, date, lieu, contact, email, sexe, sang, cni, photo, matricule) values ('".$membre->getNom()."','".$membre->getPrenom()."','".$membre->getDate()."','".$membre->getLieu()."','".$membre->getContact()."','".$membre->getEmail()."','".$membre->getSexe()."','".$membre->getSang()."','".$membre->getCni()."','".$membre->getPhoto()."','".$membre->getMatricule()."')";
    $resultat = mysqli_query($connexion, $query) or die(mysqli_error($connexion));

    
    if($resultat)
    {
        $_SESSION['matricule']=$matricule;
        $req = "select * from annee_pastorale where statut = 'active'";
        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
        $annee=mysqli_fetch_assoc($fic);

        $req = "select * from jeciste where matricule = '".$membre->getMatricule()."'";
        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
        $jeciste=mysqli_fetch_assoc($fic);

        $militer = new Militer();
        $militer->setIdInstance($_SESSION["instance"]);
        $militer->setIdAnnee($annee['id']);
        $militer->setIdJeciste($jeciste["id"]);
        $militer->setStatut('En attente');

        $query1 = "insert into militer(idinstance, idannee, idjeciste, statut) values (".$militer->getIdInstance().",".$militer->getIdAnnee().",".$militer->getIdJeciste().",'".$militer->getStatut()."')";
        $resultat = mysqli_query($connexion, $query1) or die(mysqli_error($connexion));
    }
    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../resultat.php'>";
}


/******************************************
 *  Ajout d'un abonné
 *****************************************/
    if(isset($_POST['btn-abonne']))
    {
        $query = "insert into abonnement(email) values ('".$_POST["nl-email"]."')";
        mysqli_query($connexion, $query) or die(mysqli_error($connexion));
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../index.php'>";
    }

    if(isset($_POST['btn-abonne1']))
    {
        $query = "insert into abonnement(email) values ('".$_POST["nl-email"]."')";
        mysqli_query($connexion, $query) or die(mysqli_error($connexion));
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../activite/index.php'>";
    }

/******************************************
 *  Selection du diocese
 *****************************************/
    if(isset($_POST['select-diocese']))
    {
        $_SESSION['diocese']=$_POST['diocese'];
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../instance.php'>";
    }

/******************************************
 *  Selection du instance
 *****************************************/
    if(isset($_POST['select-instance']))
    {
        $_SESSION['instance']=$_POST['instance'];
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../inscription.php'>";
    }

/******************************************
 *  Verification d'inscription
 *****************************************/
    if(isset($_POST['verification']))
    {
        $query = "SELECT * FROM jeciste INNER JOIN militer ON jeciste.id = militer.idjeciste INNER JOIN instance ON instance.id = militer.idinstance WHERE jeciste.matricule = '$_POST[matricule]'";
        $result = mysqli_query($connexion, $query) or die(mysqli_error($connexion));
        $totalRows = mysqli_num_rows($result);
        $jeciste = mysqli_fetch_assoc($result);
        
        if($totalRows==1)
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../verification.php?matricule=$_POST[matricule]'>";
        }
        else if($totalRows>1)
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../verification.php?error=1'>";
        }
        else
        {
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../verification.php?error=2'>";
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
        <link href="style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>
