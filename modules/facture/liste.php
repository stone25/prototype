<?php
	session_start();
	include_once('phpToPDF.php');
	include_once('../src/entity/Connexion.php');

	$connexion = new Connexion();

	if($connexion->connecter())
	{
		$query = "SELECT * FROM instance i INNER JOIN diocese d on d.id = i.iddiocese WHERE i.id = ".$_SESSION["useridinstance"];
		$fic = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic);
		$instance=mysqli_fetch_assoc($fic);

		$query = "SELECT j.id AS idjeciste, matricule, nom, prenom, date, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle, type, i.id AS idinstance, d.id AS iddiocese FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese WHERE d.id = ".$_SESSION["useriddiocese"]." ORDER BY denomination, nom, prenom";
		$fic1 = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic1);
	}

	//$pdf = new FPDF();
	$doc = "Liste des jecistes du diocese de ".utf8_decode($instance["libelle"]).".pdf";
	$pdf = new phpToPDF();
	$pdf->AddPage();

/************************************
*Entete et pied
*************************************/
	$pdf->Image("img/entete.png",0,0,0,31.5);
	$pdf->Image("img/pied.png",0,279.4,0,17.35);	

/************************************
*Sous-titre état civil
*************************************/
	$pdf->Image("img/bar.jpg",0,46,0,5);
	$pdf->SetFont('Arial','BI',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(5,50,utf8_decode("N°"));
	$pdf->Text(15,50,utf8_decode("Matricule"));
	$pdf->Text(60,50,utf8_decode("Nom et prénoms"));
	$pdf->Text(130,50,utf8_decode("Poste"));
	$pdf->Text(184,50,utf8_decode("Contact"));

/************************************
*Information état civil
*************************************/
	$x = 5;
	$y = 50;
	$i = 0;
	$page = 1;
	$instance = '';
	while($rows=mysqli_fetch_assoc($fic1))
	{
		$i++;
		if($instance == '')
		{
			/************************************
			*Titre
			*************************************/
			$pdf->SetFont('Arial','B',24);
			$pdf->SetTextColor(34,66,124);
			$pdf->Text(10,41,utf8_decode("$rows[denomination]"));
			$instance = $rows["denomination"];
		}

		if($i%30 == 0 || ($instance != '' && $instance != $rows["denomination"]))
		{
			$page++;
			$x = 5;
			$y = 50;
			$pdf->AddPage();

			/************************************
			*Entete et pied
			*************************************/
			$pdf->Image("img/entete.png",0,0,0,31.5);
			$pdf->Image("img/pied.png",0,279.4,0,17.35);

			if($instance != '' && $instance != $rows["denomination"])
			{
				/************************************
				*Titre
				*************************************/
				$pdf->SetFont('Arial','B',24);
				$pdf->SetTextColor(34,66,124);
				$pdf->Text(10,41,utf8_decode("$rows[denomination]"));
				$instance = $rows["denomination"];
				$i = 1;
			}

			/************************************
			*Sous-titre état civil
			*************************************/
			$pdf->Image("img/bar.jpg",0,46,0,5);
			$pdf->SetFont('Arial','BI',12);
			$pdf->SetTextColor(0,0,0);
			$pdf->Text(5,50,utf8_decode("N°"));
			$pdf->Text(15,50,utf8_decode("Matricule"));
			$pdf->Text(60,50,utf8_decode("Nom et prénoms"));
			$pdf->Text(130,50,utf8_decode("Poste"));
			$pdf->Text(184,50,utf8_decode("Contact"));
		}
		
		
		$y = $y + 7;

		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Text($x,$y,$i);
		$pdf->Text($x+7,$y, $rows["matricule"]);
		$pdf->Text($x+40,$y,substr(utf8_decode($rows["nom"]).' '.utf8_decode($rows["prenom"]),0,32));
		$pdf->Text($x+110,$y,substr(utf8_decode($rows["poste"]),0,40));
		$pdf->Text($x+180,$y,substr(utf8_decode($rows["contact"]),0,8));
		
		
	}
	
	
	$pdf->Output($doc, 'I');
	//$pdf->Output('t.pdf','I');

?>