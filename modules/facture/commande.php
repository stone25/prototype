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

		$query = "SELECT nom, prenom, m.statut AS poste, contact, denomination FROM commande c INNER JOIN commander co ON c.id = co.idcommande INNER JOIN jeciste j ON j.id = co.idjeciste INNER JOIN militer m ON m.idjeciste = j.id INNER JOIN instance i ON i.id = m.idinstance WHERE c.id = $_GET[id] ORDER BY nom, prenom";
		$fic1 = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic1);
	}

	//$pdf = new FPDF();
	$doc = "Commande $commande[numero].pdf";
	$pdf = new phpToPDF();
	$pdf->AddPage();

/************************************
*Entete et pied
*************************************/
	$pdf->Image("img/entete.png",0,0,0,31.5);
	$pdf->Image("img/pied.png",0,279.4,0,17.35);

/************************************
*Titre
*************************************/
	$pdf->SetFont('Arial','B',24);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(50,41,utf8_decode("Commande numéro $commande[numero]"));

/************************************
*Sous-titre état civil
*************************************/
	$pdf->Image("img/bar.jpg",0,46,0,5);
	$pdf->SetFont('Arial','BI',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(5,50,utf8_decode("N°"));
	$pdf->Text(20,50,utf8_decode("Nom et prénoms"));
	$pdf->Text(90,50,utf8_decode("Instance"));
	$pdf->Text(160,50,utf8_decode("Poste"));

/************************************
*Information état civil
*************************************/
	$x = 5;
	$y = 50;
	$i = 0;
	$page = 1;
	while($rows=mysqli_fetch_assoc($fic1))
	{
		$i++;
		$y = $y + 7;

		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Text($x,$y,$i);
		$pdf->Text($x+7,$y,substr(utf8_decode($rows["nom"]).' '.utf8_decode($rows["prenom"]),0,25));
		$pdf->Text($x+60,$y,substr(utf8_decode($rows["denomination"]),0,40));
		$pdf->Text($x+155,$y,substr(utf8_decode($rows["poste"]),0,22));

		if($i%30 == 0)
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

			/************************************
			*Titre
			*************************************/
			$pdf->SetFont('Arial','B',24);
			$pdf->SetTextColor(34,66,124);
			$pdf->Text(50,41,utf8_decode("Commande numéro $commande[numero]"));

			/************************************
			*Sous-titre état civil
			*************************************/
			$pdf->Image("img/bar.jpg",0,46,0,5);
			$pdf->SetFont('Arial','BI',12);
			$pdf->SetTextColor(0,0,0);
			$pdf->Text(5,50,utf8_decode("N°"));
			$pdf->Text(20,50,utf8_decode("Nom et prénoms"));
			$pdf->Text(90,50,utf8_decode("Instance"));
			$pdf->Text(160,50,utf8_decode("Poste"));
		}
	}
	
	
	$pdf->Output($doc, 'I');
	//$pdf->Output('t.pdf','I');

?>