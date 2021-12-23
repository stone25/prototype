<?php
session_start();
$titre = 'Photo';
$page = 'PsyTrotter';
include_once('../src/entity/connexion.php');
include_once('../src/entity/photo.php');

$connexion = new Connexion();
if($connexion->connecter() && isset($_GET["edit"]))
{
	$query = "SELECT * FROM photo WHERE id_photo = $_GET[edit]";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
	$photo = mysqli_fetch_assoc($result);
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
				<li class="active">Galérie</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Photo</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php if(isset($_GET["edit"])){echo"Modifier"; }else{echo"Ajouter"; } ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="POST" action="../src/control/blog/control_photo.php<?php if(isset($_GET["edit"])){echo'?edit='.$photo["id_photo"]; } ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Dénomination</label>
									<input class="form-control" placeholder="Titre de la photo" name="titre" <?php if(isset($_GET["edit"])){echo'value="'.$photo["titre_photo"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="15" placeholder="Description de la photo" name="description"><?php if(isset($_GET["edit"])){echo $photo["desc_photo"]; } ?></textarea>
								</div>
								<div class="form-group">
									<label>Etat</label>
									<select name="etat" class="form-control">
										<option <?php if(isset($_GET["edit"]) && $photo["etat_photo"]=='Invisible'){echo'selected'; } ?>>Invisible</option>
										<option <?php if(isset($_GET["edit"]) && $photo["etat_photo"]=='Visible'){echo'selected'; } ?>>Visible</option>
									</select>
								</div>
								<div class="form-group">
									<label>Activité</label>
									<select name="activite" class="form-control">
										<?php 
											if($connexion->connecter())
											{
												$query = "SELECT * FROM activite ORDER BY id_act DESC";
												$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
												
												

												while($activite = mysqli_fetch_assoc($result))
												{
													if(isset($_GET["edit"]) && $photo['id_act']==$activite['id_act'])
													{
														$select = 'selected';
													}
													else
													{
														$select = '';
													}

													echo'<option value="'.$activite['id_act'].'" '.$select.'>'.$activite['den_act'].'</option>';
												}
												
											} 
										?>
										
									</select>
								</div>
								
								<div class="form-group">
									<label>Photo</label>
									<input type="file" name="photo">
								</div>
								
								<br>
								<button type="submit" class="btn btn-primary" <?php if(isset($_GET["edit"])){echo'name="photoedit"'; }else{echo'name="photoadd"'; } ?>>Enregistrer</button>
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
