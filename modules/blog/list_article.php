<?php
session_start();
$titre = 'Article';
$page = 'JEC Admin';
include_once('../src/entity/Connexion.php');
include_once('../src/entity/Article.php');

$connexion = new Connexion();
if($connexion->connecter())
{
	$query = "SELECT * FROM article INNER JOIN blogueur ON blogueur.id_user = article.id_user ORDER BY date_art DESC";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
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
					<div class="panel-heading">Liste</div>
					<div class="panel-body">
						<div class="col-md-12">
							
							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Titre</th>
										<th>Vue</th>
										<th>Statut</th>
										<th>Rédacteur</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$i = 0;
									while($article = mysqli_fetch_assoc($result))
									{
										$i++;
										echo'<tr>
												<td>'.$i.'</td>
												<td>'.$article["date_art"].'</td>
												<td>'.$article["titre_art"].'</td>
												<td>'.$article["vue_art"].'</td>
												<td>'.$article["stat_art"].'</td>
												<td>'.$article["nom_user"].' '.$article["pren_user"].'</td>
												<td>';
													if($article["stat_art"]=="Invisible")
													{
														echo'<a href="../src/control/blog/control_blog.php?visibility='.$article["id_art"].'&status=Visible"><em class="fa fa-eye">&nbsp;</em>';
													}
													else
													{
														echo'<a href="../src/control/blog/control_blog.php?visibility='.$article["id_art"].'&status=Invisible"><em class="fa fa-eye-slash">&nbsp;</em>';
													}
													echo'</a>
													<a href="new_article.php?edit='.$article["id_art"].'"><em class="fa fa-edit">&nbsp;</em></a>
													<!--a href="src/control/control_blog.php?edit='.$article["id_art"].'"><em class="fa fa-trash">&nbsp;</em></a-->
												</td>
											</tr>';
									}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Titre</th>
										<th>Vue</th>
										<th>Statut</th>
										<th>Rédacteur</th>
										<th>Actions</th>
									</tr>
								</tfoot>
							</table>
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
	<script type="text/javascript" src="plugin/datatables/datatables.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#example').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
				}
			});
		});
	</script>
	
</body>
</html>
