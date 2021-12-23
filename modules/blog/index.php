<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JEC - Connexion</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Authentification</div>
				<div class="panel-body">
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
					<form role="form" method="POST" action="../src/control/blog/control_user.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nom d'blogueur" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
							</div>
							<button type="submit" name="authenticate" class="btn btn-primary">Connexion</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
