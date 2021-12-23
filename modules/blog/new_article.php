<?php
session_start();
$titre = 'Article';
$page = 'JEC Admin';
include_once('../src/entity/Connexion.php');
include_once('../src/entity/Article.php');

$connexion = new Connexion();
if($connexion->connecter() && isset($_GET["edit"]))
{
	$query = "SELECT * FROM article WHERE id_art = $_GET[edit]";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
	$article = mysqli_fetch_assoc($result);
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
				<li class="active">Blog</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Article</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php if(isset($_GET["edit"])){echo"Modifier"; }else{echo"Ajouter"; } ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<form role="form" method="POST" action="../src/control/blog/control_blog.php<?php if(isset($_GET["edit"])){echo'?edit='.$article["id_art"]; } ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label>Titre</label>
									<input class="form-control" placeholder="Titre de l'article" name="titre" <?php if(isset($_GET["edit"])){echo'value="'.$article["titre_art"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Contenu 1</label>
									<textarea class="form-control" rows="15" placeholder="Contenu de l'article" name="contenu1"><?php if(isset($_GET["edit"])){echo $article["cont1_art"]; } ?></textarea>
								</div>
								<div class="form-group">
									<label>Citation</label>
									<input class="form-control" placeholder="Citation contextuelle" name="citation" <?php if(isset($_GET["edit"])){echo'value="'.$article["cit_art"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Auteur</label>
									<input class="form-control" placeholder="Auteur de la citation" name="auteur" <?php if(isset($_GET["edit"])){echo'value="'.$article["aut_art"].'"'; } ?>>
								</div>
								<div class="form-group">
									<label>Contenu 2</label>
									<textarea class="form-control" rows="15" placeholder="Suite de l'article" name="contenu2"><?php if(isset($_GET["edit"])){echo $article["cont2_art"]; } ?></textarea>
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
											<label>Photo de couverture</label>
											<input type="file" name="photo2">
										</div>
									</div>
								</div>
								<br>
								<button type="submit" class="btn btn-primary" <?php if(isset($_GET["edit"])){echo'name="articleedit"'; }else{echo'name="articleadd"'; } ?>>Enregistrer</button>
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
