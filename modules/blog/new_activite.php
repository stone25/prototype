<?php
session_start();
$titre = 'Activité';
$page = 'PsyTrotter';
include_once('../src/entity/connexion.php');
include_once('../src/entity/activite.php');

$connexion = new Connexion();
if($connexion->connecter() && isset($_GET["edit"]))
{
	$query = "SELECT * FROM activite WHERE id_act = $_GET[edit]";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
	$activite = mysqli_fetch_assoc($result);
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
				<li class="active">Evènement</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Activité</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php if(isset($_GET["edit"])){echo"Modifier"; }else{echo"Ajouter"; } ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="POST" action="../src/control/blog/control_activite.php<?php if(isset($_GET["edit"])){echo'?edit='.$activite["id_act"]; } ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Dénomination</label>
									<input class="form-control" placeholder="Dénomination de l'activité" name="denomination" <?php if(isset($_GET["edit"])){echo'value="'.$activite["den_act"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="15" placeholder="Description de l'activité" name="description"><?php if(isset($_GET["edit"])){echo $activite["desc_act"]; } ?></textarea>
								</div>
								<div class="form-group">
									<label>Lieu</label>
									<input type="date" class="form-control" placeholder="Date" name="date" <?php if(isset($_GET["edit"])){echo'value="'.$activite["date_act"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Lieu</label>
									<input class="form-control" placeholder="Lieu de l'activité" name="lieu" <?php if(isset($_GET["edit"])){echo'value="'.$activite["lieu_act"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Photo</label>
									<input type="file" name="photo">
								</div>
								<br>
								<button type="submit" class="btn btn-primary" <?php if(isset($_GET["edit"])){echo'name="activiteedit"'; }else{echo'name="activiteadd"'; } ?>>Enregistrer</button>
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
