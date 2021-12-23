<?php 
include_once('connexion.php'); 

if($connexion)
{    
    /*$req = "select distinct instance, diocese from jeciste where instance not in (select denomination from instance) order by diocese, instance asc";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $i = 0;
    while($rows=mysqli_fetch_assoc($fic))
    {
        $i++;
        $req = "select id from diocese where libelle like '%$rows[diocese]%'";
        $fic1 = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
        
        $row=mysqli_fetch_assoc($fic1);
        $rows["instance"]=str_replace("'","''", $rows["instance"]);

        $q = "insert into instance(denomination, iddiocese) value ('$rows[instance]' , $row[id])";
        $fic2 = mysqli_query($connexion, $q) or die(mysqli_error($connexion));
        if($fic2)
        {
            echo"<p style='color: green'>insert into instance(denomination, iddiocese) value ('$rows[instance]' , $row[id]);</p>";
        }
        else
        {
            echo"<p style='color: red'>insert into instance(denomination, iddiocese) value ('$rows[instance]' , $row[id]);</p>";
        }
    }*/

    /*$req = "select * from jeciste";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $i = 0;
    while($rows=mysqli_fetch_assoc($fic))
    {
        $i++;

        $rows["instance"]=str_replace("'","''", $rows["instance"]);
        $req1 = "select id from instance where denomination like '%$rows[instance]%'";
        $fic1 = mysqli_query($connexion, $req1) or die(mysqli_error($connexion));
        $row=mysqli_fetch_assoc($fic1);
        $respo = $rows["responsabilite"];
        $respo=str_replace("'","''", $rows["responsabilite"]);

        if($respo == '')
        {
            $respo = 'Membre';
        }

        $req2 = "select count(*) as cpt from militer where idjeciste = $rows[id] and idinstance = $row[id] and idannee = 1";
        $fic2 = mysqli_query($connexion, $req2) or die(mysqli_error($connexion));
        $ro=mysqli_fetch_assoc($fic2);

        if($ro["cpt"]==0)
        {
            $q = "insert into militer value ($row[id] , 1, $rows[id], '$respo')";
            $fic2 = mysqli_query($connexion, $q) or die(mysqli_error($connexion));
            
            if($row["id"]!='')
            {
                echo"<p style='color: green'>insert into militer value ($row[id] , 1, $rows[id], '$respo')</p>";
            }
            else
            {
                echo"<p style='color: red'>insert into militer value ($row[id] , 1, $rows[id], '$respo')</p>";
            }
        }
    }*/
}
?>