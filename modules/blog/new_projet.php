<?php
session_start();
$titre = 'projet';
$page = 'JEC Admin';
include_once('../src/entity/Connexion.php');
include_once('../src/entity/Projet.php');

$connexion = new Connexion();
if($connexion->connecter() && isset($_GET["edit"]))
{
	$query = "SELECT * FROM projet WHERE id_pro = $_GET[edit]";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
	$projet = mysqli_fetch_assoc($result);
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
				<li class="active">Projet</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Projet</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php if(isset($_GET["edit"])){echo"Modifier"; }else{echo"Ajouter"; } ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="POST" action="../src/control/blog/control_projet.php<?php if(isset($_GET["edit"])){echo'?edit='.$projet["id_pro"]; } ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Dénomination</label>
									<input class="form-control" placeholder="Dénomination du projet" name="denomination" <?php if(isset($_GET["edit"])){echo'value="'.$projet["den_pro"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="15" placeholder="Description du projet" name="description"><?php if(isset($_GET["edit"])){echo $projet["desc_pro"]; } ?></textarea>
								</div>
								<div class="form-group">
									<label>Catégorie</label>
									<select name="categorie" class="form-control">
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Villa'){echo'selected'; } ?>>Villa</option>
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Immeuble'){echo'selected'; } ?>>Immeuble</option>
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Entreprise'){echo'selected'; } ?>>Entreprise</option>
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Genie civil'){echo'selected'; } ?>>Genie civil</option>
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Piscine'){echo'selected'; } ?>>Piscine</option>
										<option <?php if(isset($_GET["edit"]) && $projet["cat_pro"]=='Entrepôt'){echo'selected'; } ?>>Entrepôt</option>
									</select>
								</div>
								<div class="form-group">
									<label>Lieu</label>
									<input class="form-control" placeholder="Lieu du projet" name="lieu" <?php if(isset($_GET["edit"])){echo'value="'.$projet["lieu_pro"].'"'; } ?>>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Début</label>
											<input type="date" class="form-control" placeholder="Dénomination du projet" name="debut" <?php if(isset($_GET["edit"])){echo'value="'.$projet["deb_pro"].'"'; } ?>>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Fin</label>
											<input type="date" class="form-control" placeholder="Dénomination du projet" name="fin" <?php if(isset($_GET["edit"])){echo'value="'.$projet["fin_pro"].'"'; } ?>>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Photo de couverture</label>
											<input type="file" name="photo1">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Photo d'illustration 1</label>
											<input type="file" name="photo2">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Photo d'illustration 2</label>
											<input type="file" name="photo3">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Photo d'illustration 3</label>
											<input type="file" name="photo4">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Photo d'illustration 4</label>
											<input type="file" name="photo5">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Responsable</label>
									<input class="form-control" placeholder="Ex: Kouassi Thomas" name="responsable" <?php if(isset($_GET["edit"])){echo'value="'.$projet["respo_pro"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Client</label>
									<input class="form-control" placeholder="Ex: Touré Issouf" name="client" <?php if(isset($_GET["edit"])){echo'value="'.$projet["clt_pro"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Appréciation</label>
									<textarea class="form-control" rows="15" placeholder="Appréciation du client" name="appreciation"><?php if(isset($_GET["edit"])){echo $projet["appr_pro"]; } ?></textarea>
								</div>
								<br>
								<button type="submit" class="btn btn-primary" <?php if(isset($_GET["edit"])){echo'name="projetedit"'; }else{echo'name="projetadd"'; } ?>>Enregistrer</button>
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
