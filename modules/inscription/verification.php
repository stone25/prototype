<?php 
session_start();
include_once('../src/entity/connexion.php'); 

if(isset($_GET['matricule']))
{
	$query = "SELECT * FROM jeciste INNER JOIN militer ON jeciste.id = militer.idjeciste INNER JOIN instance ON instance.id = militer.idinstance WHERE jeciste.matricule = '$_GET[matricule]'";
	$result = mysqli_query($connexion, $query) or die(mysqli_error($connexion));
	$totalRows = mysqli_num_rows($result);
	$jeciste = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>JEC-CI | Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<?php 
					if(isset($_GET['error']) && $_GET['error']==1) 
					{
						echo'<h4 style="color: red; text-align: center">Ce matricule est dupliqué. Veuillez contacter le Bureau National</h4>';
					}
					else if(isset($_GET['error']) && $_GET['error']==2)
					{
						echo'<h4 style="color: red; text-align: center">Ce matricule est introuvable !</h4>';
					}
				?>
				<span class="login100-form-avatar">
					<img src="images/logo.png" alt="AVATAR">
				</span>
				
				<?php 
				if(isset($_GET['matricule']))
				{
					if($jeciste['statut']!='En cours' && $jeciste['statut']!='En attente' && $jeciste['statut']!='') 
					{
						echo'<h5 style="color: green; text-align: center; margin-bottom:20px">Statut: Vous êtes membre</h5>
							 <h6 style="text-align: center; margin-bottom:20px">Entrez votre mot de passe</h6>';
					}
					else 
					{
						if($jeciste['statut']=='En attente')
						{
							$msg = "Vous n'avez pas encore payé votre carte JEC";
						}
						else if($jeciste['statut']=='En cours')
						{
							$msg = "Votre carte JEC est en cours de production";
						}
						else if($jeciste['statut']=='')
						{
							$msg = "Statut ambigu. Contactez le Bureau National";
						}
						echo'<h5 style="color: red; text-align: center; margin-bottom:20px">Statut: '.$msg.'</h5>
							<h6 style="text-align: center; margin-bottom:20px">Entrez votre matricule</h6>';
					}
				}
				else
				{
					echo'<h6 style="text-align: center; margin-bottom:20px">Entrez votre matricule</h6>';
				}
					
				?>
				
				<form class="login100-form validate-form" action='../src/control/inscription/inscription.php' method='POST'>
					
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<?php 
						if(isset($_GET['matricule']) && $jeciste['statut']!='En cours' && $jeciste['statut']!='En attente' && $jeciste['statut']!='') 
						{
							echo'<input class="input100" type="text" name="password">
								 <span class="focus-input100"  data-placeholder="Mot de passe"></span>';
						}
						else
						{
							echo'<input class="input100" type="text" name="matricule">
								 <span class="focus-input100"  data-placeholder="Matricule"></span>';
						}
							
						?>
						
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="verification" class="login100-form-btn">
							Vérifier
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>