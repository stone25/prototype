<?php
    session_start();
    include_once('connexion.php'); 
    include_once('../model/Membre.php'); 

/******************************************
 * modification d'un membre
 *****************************************/
    if(isset($_POST["btn-connexion"]))
    {
        $_POST["password"] = str_replace("'","''", $_POST["password"]);
        $req = "select statut, count(*) as cpt from jeciste inner join utilisateur on id=idjeciste where matricule ='$_POST[matricule]' and password ='$_POST[password]' group by statut";
        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
        $rows=mysqli_fetch_assoc($fic);

        if($rows['cpt']==1 && $rows['statut']=='Actif')
        {
            $req = "select * from jeciste where matricule ='$_POST[matricule]'";
            $fic1 = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
            $row=mysqli_fetch_assoc($fic1);

            $membre = new Membre();
            $membre->setId($row["id"]);
            $membre->setNom($row["nom"]);
            $membre->setPrenom($row["prenom"]);
            $membre->setDate($row["date"]);
            $membre->setLieu($row["lieu"]);
            $membre->setContact($row["contact"]);
            $membre->setEmail($row["email"]);
            $membre->setMatricule($row["matricule"]);
            $membre->setSang($row["sang"]);
            $membre->setCni($row["cni"]);
            $membre->setSexe($row["sexe"]);
            $membre->setPhoto($row["photo"]);

            $_SESSION["username"] = $membre->getNom();
            $_SESSION["userid"] = $membre->getId();
            $_SESSION["userimg"] = $membre->getPhoto();


            if($_SESSION["userimg"] == 'defaut.jpg')
            {
                if($membre->getSexe()=='F')
                {
                    $_SESSION["userimg"] = 'defaut-femme.jpg';
                }
                else
                {
                    $_SESSION["userimg"] = 'defaut-homme.jpg';
                }
            }

            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../accueil.php'>";
        }
        else if($rows['cpt']==1 && $rows['statut']=='Nouveau')
        {
            $req = "select * from jeciste where matricule ='$_POST[matricule]'";
            $fic1 = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
            $row=mysqli_fetch_assoc($fic1);

            $membre = new Membre();
            $membre->setId($row["id"]);
            $membre->setNom($row["nom"]);
            $membre->setPrenom($row["prenom"]);
            $membre->setDate($row["date"]);
            $membre->setLieu($row["lieu"]);
            $membre->setContact($row["contact"]);
            $membre->setEmail($row["email"]);
            $membre->setMatricule($row["matricule"]);
            $membre->setSang($row["sang"]);
            $membre->setCni($row["cni"]);
            $membre->setSexe($row["sexe"]);
            $membre->setPhoto($row["photo"]);


            $_SESSION["username"] = $membre->getNom();
            $_SESSION["userprenom"] = $membre->getPrenom();
            $_SESSION["userid"] = $membre->getId();
            $_SESSION["userimg"] = $membre->getPhoto();

            $req = "select statut, denomination from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id where matricule ='$_POST[matricule]'";
            $fic1 = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
            $row=mysqli_fetch_assoc($fic1);

            $_SESSION["userinstance"] = $row["denomination"];
            $_SESSION["userstatut"] = $row["statut"];

            if($_SESSION["userimg"] == 'defaut.jpg')
            {
                if($membre->getSexe()=='F')
                {
                    $_SESSION["userimg"] = 'defaut-femme.jpg';
                }
                else
                {
                    $_SESSION["userimg"] = 'defaut-homme.jpg';
                }
            }

            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../password.php'>";
        }
        else if($rows['cpt']==1 && $rows['statut']=='Inactif')
        {
            $_SESSION["message"] = "Votre compte est désactivé. Veuillez contacter l'administrateur";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
        }
        else if($rows['cpt']>1)
        {
            $_SESSION["message"] = "Conflit d'utilisateurs. Veuillez contacter l'administrateur";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
        }
        else
        {
            $_SESSION["message"] = "Cet utilisateur n'existe pas. Veuillez vérifier le matricule et le mot de passe.";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
        }
        
    }

    if(isset($_POST["btn-password"]))
    {
        if($_POST['password1']==$_POST['password2'])
        {
            $query = "update utilisateur set password = '".$_POST['password1']."', statut = 'Actif' where idjeciste = ".$_SESSION["userid"];
            mysqli_query($connexion, $query) or die(mysqli_error($connexion));

            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../accueil.php'>";
        }
        else
        {
            $_SESSION["message"] = "Les mots de passe sont différents. Veillez réessayer";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
        }
    }

    if(isset($_GET["logout"]))
    {
        unset($_SESSION["userid"]);
        unset($_SESSION["username"]);
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
    }

/******************************************
 *  d'un membre
 *****************************************/
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
