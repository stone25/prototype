<?php
session_start();
include_once('../src/entity/Connexion.php'); 
$titre = 'Liste';
$page = 'Export';
$connexion = new Connexion();
?>
<!doctype html>
<html class="no-js" lang="fr">

<!-- Start Left menu area -->
<?php include_once('include/head.php'); ?>
<!-- End Left menu area -->

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <!-- Start Left menu area -->
    <?php include_once('include/menu.php'); ?>
    <!-- End Left menu area -->


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        
        <!-- Start Left menu area -->
        <?php include_once('include/menu-top.php'); ?>
        <!-- End Left menu area -->

        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                  
                  <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Liste des jécistes du diocèse de <?php if(isset($_SESSION["userdiocese"])){echo $_SESSION["userdiocese"];} ?></h3>
                        <ul class="basic-list">
                          <form method='POST' action='../src/control/admin/commande.php'>
                            <?php
                              $iddiocese = $_SESSION["useriddiocese"];
                              $instance = $_SESSION["userinstance"];
                              $couleur = array('btn btn-primary','btn btn-success','btn btn-warning','btn btn-danger','btn btn-info','btn btn-primary','btn btn-success','btn btn-warning','btn btn-danger','btn btn-info','btn btn-primary','btn btn-success','btn btn-danger','btn btn-warning','btn btn-info','btn btn-primary');

                              if($instance=="Bureau National de Côte d'Ivoire")
                              {
                                $req = "SELECT j.id AS idjeciste, matricule, nom, prenom, j.date AS ddn, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle, co.statut AS statut FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese LEFT JOIN commander c ON c.idjeciste = j.id LEFT JOIN commande co ON co.id = c.idcommande ORDER BY libelle, nom, prenom";
                                $diocese = $_SESSION["userdiocese"];
                                $flag = 1;
                              }
                              else
                              {
                                $req = "SELECT j.id AS idjeciste, matricule, nom, prenom, j.date AS ddn, lieu, sexe, contact, email, cni, sang, photo, denomination, localisation, m.statut AS poste, libelle, co.statut AS statut FROM jeciste j  INNER JOIN militer m on j.id = m.idjeciste INNER JOIN instance i ON m.idinstance = i.id INNER JOIN diocese d ON d.id = i.iddiocese LEFT JOIN commander c ON c.idjeciste = j.id LEFT JOIN commande co ON co.id = c.idcommande WHERE d.id = $iddiocese ORDER BY nom, prenom";
                                $diocese = '';
                                $flag = 0;
                              }
                              
                              $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                              $i =0;
                              $k=0;

                              $index = '';
                              while($rows=mysqli_fetch_assoc($fic))
                              {
                                if($diocese != '')
                                {
                                  if(($diocese != $rows['libelle'] && $k < 16) && $flag == 0)
                                  {
                                    $k++;
                                  }
                                  $flag = 0;
                                  $diocese = $rows['libelle'];

                                  $index = '<small class="'.$couleur[$k].'">'.$diocese.'</small>';
                                }

                                $checkbox = '';
                                if($rows['statut']=='')
                                {
                                  $class = 'pull-right label-danger label-1 label';
                                  $checkbox = '<input class="pull-right" style="margin-left: 5px;" type="checkbox" name="commande[]" value="'.$rows['idjeciste'].'">';
                                  $rows['statut'] = 'Non-payée';
                                }
                                else if($rows['statut']=='Commandée')
                                {
                                  $checkbox = '<a class="pull-right label-info label-4 label" href="../src/control/admin/commande.php?id='.$rows['idjeciste'].'&action=supprimer" style="margin-left: 5px;" ><i class="fa fa-trash"></i></a>';
                                  $class = 'pull-right label-purple label-2 label';
                                }
                                else if($rows['statut']=='En production')
                                {
                                  $class = 'pull-right label-warning label-5 label';
                                }
                                else if($rows['statut']=='Disponible')
                                {
                                  $class = 'pull-right label-info label-4 label';
                                }
                                else if($rows['statut']=='Livrée')
                                {
                                  $class = 'pull-right label-success label-3 label';
                                }

                                $ddn = substr($rows['ddn'],8,2).'/'.substr($rows['ddn'],5,2).'/'.substr($rows['ddn'],0,4);
                                echo'<li>'.$index.' '.$rows['nom'].' '.$rows['prenom'].' - '.$ddn.' - <b>'.$rows['contact'].'</b>'.$checkbox.'<span class="'.$class.'">'.$rows['statut'].'</span></li>';
                              }
                            ?>
                            <input class="pull-right btn btn-success" style="margin: 10px;" name="btn-commande" type="submit" value="commander">
                          </form>
                            <!--li>Google Chrome <span class="pull-right label-danger label-1 label">95.8%</span></li>
                            <li>Mozila Firefox <span class="pull-right label-purple label-2 label">85.8%</span></li>
                            <li>Apple Safari <span class="pull-right label-success label-3 label">23.8%</span></li>
                            <li>Internet Explorer <span class="pull-right label-info label-4 label">55.8%</span></li>
                            <li>Opera mini <span class="pull-right label-warning label-5 label">28.8%</span></li>
                            <li>Mozila Firefox <span class="pull-right label-purple label-6 label">26.8%</span></li>
                            <li>Safari <span class="pull-right label-purple label-7 label">31.8%</span></li-->
                        </ul>
                    </div>
                  </div>

                </div>
            </div>
        </div>
        <!-- Static Table End -->

        <!-- footer -->
        <?php include_once('include/footer.php'); ?>
        <!-- End footer -->
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>