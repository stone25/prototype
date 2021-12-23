<?php
	session_start();
	include_once('phpToPDF.php');
	include_once('../src/entity/Connexion.php');

	$connexion = new Connexion();

	if($connexion->connecter())
	{
		$query = "SELECT * FROM commande WHERE id = $_GET[id]";
		$fic = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic);
		$commande=mysqli_fetch_assoc($fic);

		$query = "SELECT matricule, nom, prenom, j.date AS ddn, lieu, sexe, contact, email, cni, sang, photo, m.statut AS poste, denomination, libelle, localisation FROM commande c INNER JOIN commander co ON c.id = co.idcommande INNER JOIN jeciste j ON j.id = co.idjeciste INNER JOIN militer m ON m.idjeciste = j.id INNER JOIN instance i ON i.id = m.idinstance INNER JOIN diocese d ON d.id = i.iddiocese WHERE c.id = $_GET[id] ORDER BY nom, prenom";
		$fic1 = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic1);
	}

	//$pdf = new FPDF();
	$doc = "Production $commande[numero].pdf";
	$pdf = new phpToPDF();
	$pdf->AddPage(); 


	$i = 0;	
	$x = 10;
	$y = 10;

	while($rows=mysqli_fetch_assoc($fic1))
	{
		$i++;
		/************************************
		*Fond des cartes
		*************************************/
		if($i%2 == 0)
		{
			$pdf->Image("img/carte.png",$x+100,$y,0,60);
			$pdf->Image("../admin/img/jeciste/$rows[photo]",$x+103,$y+20,0,20);
			$pdf->Image("img/ella.jpg",$x+103,$y+42,0,10);

			$temp = $rows["poste"];
			if($rows["poste"]!='Membre')
			{
				$rows["poste"] = 'Responsable';
				$xi = 173;
			}
			else
			{
				$xi = 176;
			}
			
			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(255,255,255);
			$pdf->Text($x+$xi,$y+10.5,utf8_decode($rows["poste"]));
			$rows["poste"] = $temp;

			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(255,0,0);
			$pdf->Text($x+150,$y+11,utf8_decode($rows["matricule"]));
			
			$save = $y;
			$y = $y + 14;

			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(34,66,124);
			$pdf->Text($x+125,$y,utf8_decode("Nom:"));
			$pdf->Text($x+125,$y+4,utf8_decode("Prénoms:"));
			$pdf->Text($x+125,$y+8,utf8_decode("Date de naissance:"));
			$pdf->Text($x+125,$y+12,utf8_decode("Lieu de naissance:"));
			$pdf->Text($x+125,$y+16,utf8_decode("Contact:"));
			$pdf->Text($x+125,$y+20,utf8_decode("e-mail:"));
			$pdf->Text($x+125,$y+24,utf8_decode("Groupe sanguin:"));
			$pdf->Text($x+125,$y+28,utf8_decode("Numéro CNI:"));

			$pdf->Text($x+125,$y+32,utf8_decode("Diocèse:"));
			$pdf->Text($x+125,$y+36,utf8_decode("Instance:"));
			$pdf->Text($x+125,$y+40,utf8_decode("Responsabilité:"));

			$y = $save;
			$y = $y +14;

			$pdf->SetFont('Arial','BI',6);
			$pdf->SetTextColor(0,0,0);
			$pdf->Text($x+133,$y,utf8_decode($rows["nom"]));
			$pdf->Text($x+137,$y+4,utf8_decode($rows["prenom"]));
			$ddn = substr($rows["ddn"],8,10).'/'.substr($rows["ddn"],5,2).'/'.substr($rows["ddn"],0,4);
			$pdf->Text($x+150,$y+8,utf8_decode($ddn));
			$pdf->Text($x+150,$y+12,utf8_decode($rows["lieu"]));
			$pdf->Text($x+138,$y+16,utf8_decode($rows["contact"]));
			$pdf->Text($x+135,$y+20,utf8_decode($rows["email"]));
			$pdf->Text($x+146,$y+24,utf8_decode($rows["sang"]));
			$pdf->Text($x+142,$y+28,utf8_decode($rows["cni"]));

			$pdf->Text($x+138,$y+32,utf8_decode($rows["libelle"]));
			$instance = $rows["denomination"].' ('.$rows["localisation"].')';
			$pdf->Text($x+138,$y+36,substr(utf8_decode($instance),0,42));
			$pdf->Text($x+145,$y+40,utf8_decode($rows["poste"]));

			$y = $save;
			$y = $y + 70;
		}
		else
		{
			$pdf->Image("img/carte.png",$x,$y,0,60);
			$pdf->Image("../admin/img/jeciste/$rows[photo]",$x+3,$y+20,0,20);
			$pdf->Image("img/ella.jpg",$x+3,$y+42,0,10);

			$temp = $rows["poste"];
			if($rows["poste"]!='Membre')
			{
				$rows["poste"] = 'Responsable';
				$xi = 73;
			}
			else
			{
				$xi = 76;
			}
			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(255,255,255);
			$pdf->Text($x+$xi,$y+10.5,utf8_decode($rows["poste"]));
			$rows["poste"] = $temp;

			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(255,0,0);
			$pdf->Text($x+50,$y+11,utf8_decode($rows["matricule"]));

			$save = $y;
			$y = $y +14;
			
			$pdf->SetFont('Arial','BI',7);
			$pdf->SetTextColor(34,66,124);
			$pdf->Text($x+25,$y,utf8_decode("Nom:"));
			$pdf->Text($x+25,$y+4,utf8_decode("Prénoms:"));
			$pdf->Text($x+25,$y+8,utf8_decode("Date de naissance:"));
			$pdf->Text($x+25,$y+12,utf8_decode("Lieu de naissance:"));
			$pdf->Text($x+25,$y+16,utf8_decode("Contact:"));
			$pdf->Text($x+25,$y+20,utf8_decode("e-mail:"));
			$pdf->Text($x+25,$y+24,utf8_decode("Groupe sanguin:"));
			$pdf->Text($x+25,$y+28,utf8_decode("Numéro CNI:"));

			$pdf->Text($x+25,$y+32,utf8_decode("Diocèse:"));
			$pdf->Text($x+25,$y+36,utf8_decode("Instance:"));
			$pdf->Text($x+25,$y+40,utf8_decode("Responsabilité:"));

			$y = $save;
			$y = $y +14;

			$pdf->SetFont('Arial','BI',6);
			$pdf->SetTextColor(0,0,0);
			$pdf->Text($x+33,$y,utf8_decode($rows["nom"]));
			$pdf->Text($x+37,$y+4,utf8_decode($rows["prenom"]));
			$ddn = substr($rows["ddn"],8,10).'/'.substr($rows["ddn"],5,2).'/'.substr($rows["ddn"],0,4);
			$pdf->Text($x+50,$y+8,utf8_decode($ddn));
			$pdf->Text($x+50,$y+12,utf8_decode($rows["lieu"]));
			$pdf->Text($x+38,$y+16,utf8_decode($rows["contact"]));
			$pdf->Text($x+35,$y+20,utf8_decode($rows["email"]));
			$pdf->Text($x+46,$y+24,utf8_decode($rows["sang"]));
			$pdf->Text($x+42,$y+28,utf8_decode($rows["cni"]));

			$pdf->Text($x+38,$y+32,utf8_decode($rows["libelle"]));
			$instance = $rows["denomination"].' ('.$rows["localisation"].')';
			$pdf->Text($x+38,$y+36,substr(utf8_decode($instance),0,45));
			$pdf->Text($x+45,$y+40,utf8_decode($rows["poste"]));

			$y = $save;
		}
		

		if($i%8 == 0)
		{
			$pdf->AddPage();
			$x = 10;
			$y = 10;
		}
		
		
	}
		
	$pdf->Output($doc, 'I');
	//$pdf->Output('t.pdf','I');

?>