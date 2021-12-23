<?php
session_start();
$titre = 'Activité';
$page = 'PsyTrotter';
include_once('../src/entity/Connexion.php');
include_once('../src/entity/activite.php');

$connexion = new Connexion();
if($connexion->connecter() && isset($_GET["edit"]))
{
	$query = "SELECT * FROM formation WHERE id = $_GET[edit]";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
	$formation = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php
    include_once('include/head.php');
?>
<body>

<?php
    include_once('include/top.php');
?>

<?php
    include_once('include/menu.php');
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Formation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Formation</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php if(isset($_GET["edit"])){echo"Modifier"; }else{echo"Ajouter"; } ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="POST" action="../src/control/blog/control_formation.php<?php if(isset($_GET["edit"])){echo'?edit='.$formation["id"]; } ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Dénomination</label>
									<input class="form-control" placeholder="Titre de la formation" name="titre" <?php if(isset($_GET["edit"])){echo'value="'.$formation["titre"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="15" placeholder="Description de la formation" name="description"><?php if(isset($_GET["edit"])){echo $formation["description"]; } ?></textarea>
								</div>
								<div class="form-group">
									<label>Type</label>
									<select name="type" class="form-control">
										<option <?php if(isset($_GET["edit"]) && $formation["type"]=='Doctrinale'){echo'selected'; } ?>>Doctrinale</option>
										<option <?php if(isset($_GET["edit"]) && $formation["type"]=='Humaine'){echo'selected'; } ?>>Humaine</option>
										<option <?php if(isset($_GET["edit"]) && $formation["type"]=='Spirituelle'){echo'selected'; } ?>>Spirituelle</option>
										<option <?php if(isset($_GET["edit"]) && $formation["type"]=='Technique'){echo'selected'; } ?>>Technique</option>
									</select>
								</div>
								<div class="form-group">
									<label>Document</label>
									<input type="file" name="document">
								</div>
								<br>
								<button type="submit" class="btn btn-primary" <?php if(isset($_GET["edit"])){echo'name="formationedit"'; }else{echo'name="formationadd"'; } ?>>Enregistrer</button>
								<button type="reset" class="btn btn-default">Annuler</button>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php
				include_once('include/footer.php');
			?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
