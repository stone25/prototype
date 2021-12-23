<?php 
include_once('../../../../src/entity/Connexion.php');
$connexion = new Connexion();
if($connexion->connecter())
{
    $nom = $_REQUEST["nom"];
    $message = "";

    $nom = str_replace("'","''", $nom);

    if($nom !== "") 
    {   
        $req = "select jeciste.id as id, matricule, nom, prenom, contact, sexe, photo, denomination, statut from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id where nom like '%$nom%' or prenom like '%$nom%' or contact like '%$nom%' order by nom, prenom";
    }
    else
    {
        $req = "select jeciste.id as id, matricule, nom, prenom, contact, sexe, photo, denomination, statut from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id order by nom, prenom";
    }

    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $i = 0;
    $debut = 1;
    $fin = 4;
    while($rows=mysqli_fetch_assoc($fic))
    {
        if($rows['sexe'] == 'M' || $rows['sexe'] == 'G' || $rows['sexe'] == 'H')
        {
            $defaut = 'defaut-homme.jpg';
        }
        else
        {
            $defaut = 'defaut-femme.jpg';
        }
        
        $photo = $rows['photo'];
        if($photo == '' || $photo == 'defaut.jpg')
        {
            $photo = $defaut;
        }

        $i++;
        if($i == $debut)
        {
            $debut = $i+4;
            $message.='<div class="row" style="margin-bottom: 15px">';
        }
        $message.='<a href="detail-jeciste.php?id='.$rows['id'].'"><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="student-inner-std res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="student-img">
                            <img src="img/jeciste/'.$photo.'" alt="" />
                        </div>
                        <div class="student-dtl">
                            <h2 style="font-size: 12px">'.$rows['nom'].' '.$rows['prenom'].'</h2>
                            <p class="dp" style="font-size: 11px">'.$rows['statut'].'</p>
                            <p class="dp" style="font-size: 11px"><b>'.$rows['denomination'].'</b></p>
                            <p class="dp-ag"><b>Contact:</b> '.$rows['contact'].'</p>
                        </div>
                    </div>
                </div>';
        if($i == $fin)
        {
            $fin = $fin+4;
            $message .='</div>';
        }
    }
}
echo $message;
?>