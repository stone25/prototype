<?php 
include_once('../src/entity/Connexion.php'); 
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
						echo'<h4 style="color: red">Vérifier votre login et password</h4>';
					}
					else if(isset($_GET['error']) && $_GET['error']==2)
					{
						echo'<h4 style="color: red">Veuillez vous connecter</h4>';
					}
				?>
				<span class="login100-form-avatar">
					<img src="images/logo.png" alt="AVATAR">
				</span>
				
				<!--center><a class="btn btn-primary" style='margin-bottom: 25px' href='verification.php'>Déjà inscrit(e)? Connectez vous</a></center-->
				<form class="login100-form validate-form" action='../src/control/inscription/inscription.php' method='POST'>
					
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<select class="input100" name="diocese">
						<?php
						$connexion = new Connexion();
							if($connexion->connecter())
							{
								$query = "SELECT * FROM diocese ORDER BY libelle ASC";
								$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
								while($diocese = mysqli_fetch_assoc($result))
								{
									$i++;
									echo'<option value="'.$diocese['id'].'">'.$diocese['libelle'].'</option>';
								}
							}
						?>
							
						</select>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="select-diocese" class="login100-form-btn">
							Suivant
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