<?php
	session_start();
	include_once('phpToPDF.php');
	include_once('../src/entity/Connexion.php');

	$connexion = new Connexion();

	if($connexion->connecter())
	{
		$idjeciste = $_SESSION['user']["id"];
		if(isset($_GET['id']))
		{
			$idjeciste = $_GET['id'];
		}
		$query = "SELECT j.id AS idjeciste, matricule, nom, prenom, date, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese WHERE j.id = $idjeciste";
		$fic = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
		$totalRow = mysqli_num_rows($fic);
		$rows=mysqli_fetch_assoc($fic);
	}

	//$pdf = new FPDF();
	$doc = "Fiche d'inscription $rows[matricule].pdf";
	$pdf = new phpToPDF();
	$pdf->AddPage();

/************************************
*Entete
*************************************/
	$pdf->Image("img/entete.png",0,0,0,31.5);
	$pdf->Image("img/pied.png",0,279.4,0,17.35);

/************************************
*Titre
*************************************/
	$pdf->SetFont('Arial','B',24);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(43,41,"Fiche d'inscription $rows[matricule]");

/************************************
*Sous-titre état civil
*************************************/
	$pdf->Image("img/bar.jpg",0,46,0,5);
	$pdf->SetFont('Arial','BI',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(95,50,"Etat civil");

/************************************
*Information état civil
*************************************/
	//nom
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,60,"Nom:");
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(32,60,utf8_decode($rows["nom"]));

	//prenom
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,67,utf8_decode('Prénoms:'));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(42,67,utf8_decode($rows["prenom"]));

	//date
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,74,"Date de naissance:");
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(63,74,substr($rows["date"],8,10).'/'.substr($rows["date"],5,2).'/'.substr($rows["date"],0,4));

	//lieu
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,81,'Lieu:');
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(33,81,utf8_decode($rows["lieu"]));

	//contact
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,88,'Contact:');
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(39,88,utf8_decode($rows["contact"]));

	//email
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,95,'e-mail:');
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(35,95,utf8_decode($rows["email"]));

	//groupe sanguin
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,102,'Groupe Sanguin:');
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(59,102,utf8_decode($rows["sang"]));

	//cni
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,109,utf8_decode("N° pièce d'identité:"));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(63,109,utf8_decode($rows["cni"]));

	//sexe
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,116,"Sexe:");
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(30,116,utf8_decode($rows["sexe"]));

/************************************
*Photo
*************************************/
	$pdf->Image("../admin/img/jeciste/$rows[photo]",150,60,0,50);

/************************************
*Sous-titre militantisme
*************************************/
	$pdf->Image("img/bar.jpg",0,120,0,5);
	$pdf->SetFont('Arial','BI',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(95,124,"Militantisme");

/************************************
*Information militantisme
*************************************/
	//diocese
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,135,utf8_decode("Diocèse:"));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(41,135,utf8_decode($rows["libelle"]));

	//instance
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,142,utf8_decode('Instance:'));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(41,142,utf8_decode($rows["denomination"]));

	//responsabilité
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,149,utf8_decode("Responsabilité:"));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(57,149,utf8_decode($rows["poste"]));

/************************************
*Sous-titre information
*************************************/
	$pdf->Image("img/bar.jpg",0,156,0,5);
	$pdf->SetFont('Arial','BI',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(65,160,utf8_decode("Récépissé de paiement de la carte JEC"));

/************************************
*Information état récépissé
*************************************/
	//nom
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,167,"Nom:");
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(32,167,utf8_decode($rows["nom"]));

	//prenom
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,174,utf8_decode('Prénoms:'));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(42,174,utf8_decode($rows["prenom"]));

	//diocese
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,181,utf8_decode("Diocèse:"));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(41,181,utf8_decode($rows["libelle"]));

	//instance
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,188,utf8_decode('Instance:'));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(41,188,utf8_decode($rows["denomination"]));

	//responsabilité
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,195,utf8_decode("Responsabilité:"));
	$pdf->SetFont('Arial','',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(57,195,utf8_decode($rows["poste"]));

	//date de paiement
	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(34,66,124);
	$pdf->Text(15,202,utf8_decode("Date de paiement:"));

	//nota bene
	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(15,210,utf8_decode("NB: Ce coupon fait office de reçu de faiement de la carte JEC. Il doit être visé par conséquent"));

	$pdf->SetFont('Arial','',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(15,217,utf8_decode("par le jéciste et les responsable de l'instance à laquelle il appartient."));

	$pdf->SetFont('Arial','B',14);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(15,225,utf8_decode("Signature du jéciste"));
	$pdf->Text(140,225,utf8_decode("Signature du responsable"));

	

	$pdf->Image("img/pere.jpg",15,247,0,30);
	$pdf->Image("img/ella.jpg",140,247,0,30);

	/*$pdf->SetFont('Times','B',30);
	$pdf->Text(20,27,'Facture');

	$pdf->SetFont('Times','BI',12);
	$pdf->SetTextColor(255,255,255);
	$pdf->Text(125,40,utf8_decode('Siège: Yopougon Maroc'));
	$pdf->Text(125,47,utf8_decode('Contact: +255 49075720'));
	$pdf->Text(125,54,utf8_decode('Facebook: Christarl Shop'));
	$pdf->Text(125,61,utf8_decode('Instagram: Christarl Shop'));
	$pdf->Text(125,68,utf8_decode('e-mail: shop@christarl.com'));

	$pdf->SetFont('Times','B',12);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(20,40,'Commande No: ');
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(53,40,$_SESSION["facture"]["code"]);
	$pdf->SetTextColor(0,0,0);
	$pdf->Text(86,40,' du ');
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(95,40,$_SESSION["facture"]["date"]);

	$pdf->SetTextColor(0,0,0);
	$pdf->Text(20,47,'Nom: ');
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(32,47,utf8_decode($_SESSION["facture"]["nom"]));

	$pdf->SetTextColor(0,0,0);
	$pdf->Text(20,54,'Prenoms: ');
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(40,54,utf8_decode($_SESSION["facture"]["prenom"]));

	$pdf->SetTextColor(0,0,0);
	$pdf->Text(20,61,'Contact: ');
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(40,61,$_SESSION["facture"]["contact"]);

	$pdf->SetTextColor(0,0,0);
	$pdf->Text(20,68,utf8_decode('Livraison à '));
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(45,68,utf8_decode($_SESSION["facture"]["lieu"]));
	
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Times','BI',20);
	$pdf->SetTextColor(255,255,255);
	$pdf->Text(23,77,utf8_decode('Détails de la commande'));
	
	$pdf->SetFont('Times','B',14);
	$pdf->SetTextColor(200,3,69);
	$pdf->Text(20,85,'Libelle');
	$pdf->Text(117,85,utf8_decode('Qté'));
	$pdf->Text(143,85,'PU');
	$pdf->Text(165,85,'Montant');

	$y = 90;
	$pdf->SetFont('Times','',12);
	if($connexion)
	{
		$total = 0;
		
		while($rows=mysqli_fetch_assoc($fic))
		{
			$y += 6;
			$prix = $rows["prix"] - (($rows["prix"]*$rows["reduction"])/100);

			$pdf->SetTextColor(0,0,0);
			$pdf->Text(20,$y,utf8_decode($rows['lib'])); 

			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','',12);
			$pdf->Text(120,$y,$rows['qte']);

			if($prix<1000)
			{
				$pdf->Text(142,$y,$prix);
			}
			else if($prix>=1000 && $prix<10000)
			{
				$pdf->Text(142,$y,$prix);
			}
			else if($prix>=10000)
			{
				$pdf->Text(140,$y,$prix);
			}
			
			
			$montant = $prix*$rows['qte'];
			$total += $montant;

			if($montant>=10000)
			{
				$pdf->Text(173,$y,$montant);
			}
			else
			{
				$pdf->Text(175,$y,$montant);
			}
			
		}
		
		$liv = 1000;
		$x = 175;
		$livraison = $liv;
		if($total>15000)
		{
			$livraison = "Gratuite";
			$liv = 0;
			$x = 169;
		}
		else if($total == 0)
		{
			$livraison = "-";
			$liv = 0;
		}

		
		$y += 9;
		$pdf->SetFont('Times','B',12);
		$pdf->SetTextColor(200,3,69);
		$pdf->Text(20,$y,'Livraison ');
		$pdf->Text($x,$y,$livraison);

		$y += 2;
		$net = $total + $liv;

		$pdf->Image("../../img/core-img/bar.jpg",20,$y,165,1);
		$pdf->Image("../../img/core-img/bar.jpg",20,$y+7,165,1);

		$y += 6;
		$pdf->SetFont('Times','B',14);
		$pdf->SetTextColor(200,3,69);
		$pdf->Text(20,$y,'Total: ');
		
		if($net>=10000)
		{
			$pdf->Text(158,$y,$net.' FCFA');
		}
		else
		{
			$pdf->Text(160,$y,$net.' FCFA');
		}
		
	}*/
	
	$pdf->Output($doc, 'I');
	//$pdf->Output('t.pdf','I');

?>