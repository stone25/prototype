<?php
    session_start();
    include_once('../../entity/Connexion.php'); 
    include_once('../../entity/Jeciste.php'); 
    $connexion = new Connexion();
/******************************************
 * modification d'un membre
 *****************************************/
    if(isset($_POST["btn-connexion"]))
    {
        $_POST["password"] = str_replace("'","''", $_POST["password"]);
        $req = "select statut, count(*) as cpt from jeciste inner join utilisateur on id=idjeciste where matricule ='$_POST[matricule]' and password ='$_POST[password]' group by statut";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        $rows=mysqli_fetch_assoc($fic);

        if($rows['cpt']==1 && $rows['statut']=='Actif')
        {
            //$req = "select * from jeciste where matricule ='$_POST[matricule]'";
            $req = "SELECT j.id AS idjeciste, matricule, nom, prenom, date, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle, type, i.id AS idinstance, d.id AS iddiocese FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese WHERE matricule ='$_POST[matricule]'";
            $fic1 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
            $row=mysqli_fetch_assoc($fic1);

            $membre = new Membre();
            $membre->setId($row["idjeciste"]);
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
            $_SESSION["userdiocese"] = $row["libelle"];
            $_SESSION["useriddiocese"] = $row["iddiocese"];
            $_SESSION["useridinstance"] = $row["idinstance"];
            $_SESSION["userinstance"] = $row["denomination"];
            $_SESSION["userposte"] = $row["poste"];
            $_SESSION["usertype"] = $row["type"];
            $_SESSION["usercontact"] = $row["contact"];
            $_SESSION["useremail"] = $row["email"];
            $_SESSION["usermatricule"] = $row["matricule"];

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

            if($row["type"]=='Bureau Diocésain' || $row["type"]=='Bureau National')
            {
                echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/accueil.php'>";
            }
            else 
            {
                echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../membre/accueil.php'>";
            }
        }
        else if($rows['cpt']==1 && $rows['statut']=='Nouveau')
        {
            $req = "SELECT j.id AS idjeciste, matricule, nom, prenom, date, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle, type, i.id AS idinstance, d.id AS iddiocese FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese WHERE matricule ='$_POST[matricule]'";
            $fic1 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
            $row=mysqli_fetch_assoc($fic1);

            $membre = new Membre();
            $membre->setId($row["idjeciste"]);
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
            $_SESSION["userdiocese"] = $row["libelle"];
            $_SESSION["useriddiocese"] = $row["iddiocese"];
            $_SESSION["useridinstance"] = $row["idinstance"];
            $_SESSION["userinstance"] = $row["denomination"];
            $_SESSION["userposte"] = $row["poste"];
            $_SESSION["usertype"] = $row["type"];
            $_SESSION["usercontact"] = $row["contact"];
            $_SESSION["useremail"] = $row["email"];
            $_SESSION["usermatricule"] = $row["matricule"];


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
            $id = $row["idjeciste"];
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/password.php?id=".$id."'>";
        }
        else if($rows['cpt']==1 && $rows['statut']!='Actif')
        {
            $_SESSION["message"] = "Votre compte est désactivé. Veuillez contacter l'administrateur";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/index.php'>";
        }
        else if($rows['cpt']>1)
        {
            $_SESSION["message"] = "Conflit d'utilisateurs. Veuillez contacter l'administrateur";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/index.php'>";
        }
        else
        {
            $_SESSION["message"] = "Cet utilisateur n'existe pas. Veuillez vérifier le matricule et le mot de passe.";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/index.php'>";
        }
        
    }

    if(isset($_POST["btn-password"]))
    {
        if($_POST['password1']==$_POST['password2'])
        {
            $_POST['password1'] = str_replace("'","''", $_POST['password1']);
            $id = $_GET["id"];
            $query = "UPDATE utilisateur SET password = '$_POST[password1]', statut = 'Actif' WHERE idjeciste = $id";
            mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
            //echo $query;

            if($row["type"]=='Bureau Diocésain' || $row["type"]=='Bureau National')
            {
                echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/accueil.php'>";
            }
            else 
            {
                echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../membre/accueil.php'>";
            }
            
        }
        else
        {
            $_SESSION["message"] = "Les mots de passe sont différents. Veillez réessayer";
            echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/index.php'>";
        }
    }

    if(isset($_GET["logout"]))
    {
        unset($_SESSION["userid"]);
        unset($_SESSION["username"]);
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/index.php'>";
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
        <link href="../style/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>
