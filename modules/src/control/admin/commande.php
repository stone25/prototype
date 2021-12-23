<?php
    session_start();
    include_once('../../entity/Connexion.php'); 
    include_once('../../entity/Commande.php'); 
    include_once('../../entity/Commander.php'); 
    include_once('../../entity/Jeciste.php'); 
    $connexion = new Connexion();
/******************************************
 * passer une commande
 *****************************************/
    if(isset($_POST["btn-commande"]))
    {
        $commande = new Commande();
        
        $diocese = $_SESSION["userdiocese"];
        $instance = $_SESSION["userinstance"];
        $idjeciste = $_SESSION["userid"];
        $diocese= str_replace("'","''", $diocese);
        $instance= str_replace("'","''", $instance);

        $req = "SELECT id FROM diocese WHERE libelle = '$diocese'";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        $row=mysqli_fetch_assoc($fic);
        $iddiocese = $row['id'];

        $req = "SELECT i.id AS idinstance FROM instance i INNER JOIN militer m ON m.idinstance = i.id INNER JOIN jeciste j ON j.id = m.idjeciste WHERE j.id = '$idjeciste'";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        $row=mysqli_fetch_assoc($fic);
        $idinstance = $row['idinstance'];
        
        $req = "SHOW TABLE STATUS FROM jecci1157367 LIKE 'commande' ";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        $row=mysqli_fetch_assoc($fic);
        $idcommande = $row['Auto_increment'];
        $numero = $iddiocese.'COM'.$idinstance.'-'.$idcommande;

        $date = date("Y-m-d H:i:s");

        $commande->setNumero($numero);
        $commande->setCreation($date);
        $commande->setStatut('Commandée');
        $commande->setIdjeciste($idjeciste);

        if($commande->creerCommande())
        {
            $req = "SELECT * FROM annee_pastorale WHERE statut = 'active'";
            $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
            $row=mysqli_fetch_assoc($fic);
            $idannee = $row['id'];

            foreach($_POST['commande'] as $commande)
            {
                $commander = new Commander();
                $commander->setIdAnnee($idannee);
                $commander->setIdJeciste($commande);
                $commander->setIdCommande($idcommande);
                $commander->creerCommander();

                $req = "SELECT * FROM jeciste WHERE id = $commande";
                $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                $jeciste=mysqli_fetch_assoc($fic);

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
                if(strlen($commande)==1)
                {
                    $matricule = $year.'JEC-CI000'.$commande;
                }
                else if(strlen($commande)==2)
                {
                    $matricule = $year.'JEC-CI00'.$commande;
                }
                else if(strlen($commande)==3)
                {
                    $matricule = $year.'JEC-CI0'.$commande;
                }
                else 
                {
                    $matricule = $year.'JEC-CI'.$commande;
                }

                $matricule = $matricule.$jeciste['sexe'];
                $membre = new Membre();
                $membre->setId($commande);
                $membre->setMatricule($matricule);
                $membre->attribuerMatricule();
            }
        }
        

        
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commande.php'>";
    }

/******************************************
 * supprimer une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='supprimer')
    {
        $commander = new Commander();

        $commander->setIdJeciste($_GET["id"]);
        $commander->supprimerCommander();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commande.php'>";
    }

/******************************************
 * valider une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='valider')
    {
        $commande = new Commande();

        $date = date("Y-m-d H:i:s");
        $commande->setId($_GET["id"]);
        $commande->setProduction($date);
        $commande->setStatut('En production');
        $commande->validerCommande();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commandes.php'>";
    }

/******************************************
 * annuler une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='annuler')
    {
        $commande = new Commande();

        $date = date("Y-m-d H:i:s");
        $commande->setId($_GET["id"]);
        $commande->setProduction($date);
        $commande->setStatut('Commandée');
        $commande->annulerCommande();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commandes.php'>";
    }

/******************************************
 * production une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='produire')
    {
        $commande = new Commande();

        $date = date("Y-m-d H:i:s");
        $commande->setId($_GET["id"]);
        $commande->setProduction($date);
        $commande->setStatut('Disponible');
        $commande->produireCommande();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commandes.php'>";
    }

/******************************************
 * livraison une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='livrer')
    {
        $commande = new Commande();

        $date = date("Y-m-d H:i:s");
        $commande->setId($_GET["id"]);
        $commande->setProduction($date);
        $commande->setStatut('Livrée');
        $commande->livrerCommande();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commandes.php'>";
    }

/******************************************
 * effacer une commande
 *****************************************/
    if(isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"]=='effacer')
    {
        $commande = new Commande();

        $commande->setId($_GET["id"]);
        $commande->supprimerCommande();

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/commandes.php'>";
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
