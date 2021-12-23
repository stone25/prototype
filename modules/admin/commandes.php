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
                        <h3 class="box-title">Liste des commandes du diocèse <?php if(isset($_SESSION["userdiocese"])){echo $_SESSION["userdiocese"];} ?></h3>
                        <ul class="basic-list">
                            <?php
                              $diocese = $_SESSION["userdiocese"];
                              $req = "SELECT c.id AS idcommande, numero, date_com, date_prod, statut, COUNT(idjeciste) AS nombre, nom, prenom FROM commande c INNER JOIN commander co ON c.id = co.idcommande INNER JOIN jeciste j ON j.id = c.id_user GROUP BY numero, date_com, date_prod, statut ORDER BY date_com";
                              $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                              $i =0;
                              while($rows=mysqli_fetch_assoc($fic))
                              {
                                $membre = 0;
                                $req = "SELECT IFNULL(COUNT(co.idjeciste),0) AS membre FROM commande c INNER JOIN commander co ON c.id = co.idcommande INNER JOIN jeciste j ON j.id = co.idjeciste INNER JOIN militer m ON m.idjeciste = j.id WHERE m.statut = 'Membre' AND c.id = $rows[idcommande] GROUP BY m.statut";
                                $fic1 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                                $row1=mysqli_fetch_assoc($fic1);
                                $membre = $row1['membre'];
                                if(empty($membre))
                                {
                                  $membre = 0;
                                }

                                $respo = 0;
                                $req = "SELECT IFNULL(COUNT(co.idjeciste),0) AS respo FROM commande c INNER JOIN commander co ON c.id = co.idcommande INNER JOIN jeciste j ON j.id = co.idjeciste INNER JOIN militer m ON m.idjeciste = j.id WHERE m.statut <> 'Membre' AND c.id = $rows[idcommande] GROUP BY m.statut";
                                $fic2 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
                                $respo = 0;
                                while($row2=mysqli_fetch_assoc($fic2))
                                {
                                  $respo = $respo + $row2['respo'];
                                }

                                //$respo = $row2['respo'];
                                /*if(empty($respo))
                                {
                                  $respo = 0;
                                }*/

                                $checkbox = '';
                                $download = '<a class="pull-right label-primary label-1 label" href="../facture/commande.php?id='.$rows['idcommande'].'" target="_blank" style="margin-left: 5px;" ><i class="fa fa-download"></i></a>';
                                $carte = '';
                                $supprimer = '<a class="pull-right label-danger label-4 label" href="../src/control/admin/commande.php?id='.$rows['idcommande'].'&action=effacer" style="margin-left: 5px;" ><i class="fa fa-trash"></i></a>';
                                if($rows['statut']=='')
                                {
                                  $class = 'pull-right label-danger label-1 label';
                                  $rows['statut'] = 'Non-payée';
                                }
                                else if($rows['statut']=='Commandée')
                                {
                                  if(substr($_SESSION["userposte"],0,2)=='Tr' && $_SESSION["usertype"]=='Bureau National')
                                  {
                                    $checkbox = '<a class="pull-right label-warning label-5 label" href="../src/control/admin/commande.php?id='.$rows['idcommande'].'&action=valider" style="margin-left: 5px;" ><i class="fa fa-check"></i></a>';
                                  }
                                  else
                                  {
                                    $checkbox = '';
                                  }
                                  
                                  $class = 'pull-right label-purple label-2 label';
                                }
                                else if($rows['statut']=='En production')
                                {
                                  $supprimer = '';

                                  if(substr($_SESSION["userposte"],0,2)=='Ch' && $_SESSION["usertype"]=='Bureau National')
                                  {
                                    $carte = '<a class="pull-right label-info label-1 label" href="../facture/carte.php?id='.$rows['idcommande'].'" target="_blank" style="margin-left: 5px;" ><i class="fa fa-search"></i></a>';
                                  }
                                  else
                                  {
                                    $carte = '';
                                  }
                                  
                                  
                                  if(substr($_SESSION["userposte"],0,2)=='Ch' && $_SESSION["usertype"]=='Bureau National')
                                  {
                                    $checkbox = '<a class="pull-right label-warning label-5 label" href="../src/control/admin/commande.php?id='.$rows['idcommande'].'&action=annuler" style="margin-left: 5px;" ><i class="fa fa-close"></i></a> <a class="pull-right label-success label-3 label" href="../src/control/admin/commande.php?id='.$rows['idcommande'].'&action=produire" style="margin-left: 5px;" ><i class="fa fa-check"></i></a>';
                                  }
                                  else
                                  {
                                    $checkbox = '';
                                  }
                                  
                                  $class = 'pull-right label-warning label-5 label';
                                }
                                else if($rows['statut']=='Disponible')
                                {
                                  $supprimer = '';

                                  if(substr($_SESSION["userposte"],0,2)=='Ch' && $_SESSION["usertype"]=='Bureau National')
                                  {
                                    $checkbox = '<a class="pull-right label-success label-3 label" href="../src/control/admin/commande.php?id='.$rows['idcommande'].'&action=livrer" style="margin-left: 5px;" ><i class="fa fa-check"></i></a>';
                                  }
                                  else
                                  {
                                    $checkbox = '';
                                  }
                                  
                                  $class = 'pull-right label-info label-4 label';
                                }
                                else if($rows['statut']=='Livrée')
                                {
                                  $supprimer = '';
                                  $class = 'pull-right label-success label-3 label';
                                }

                                

                                $date = substr($rows['date_com'],8,2).'/'.substr($rows['date_com'],5,2).'/'.substr($rows['date_com'],0,4);
                                echo'<li><b>'.$rows['numero'].'</b> commandé par <b>'.$rows['nom'].' '.$rows['prenom'].'</b> le <b>'.$date.'</b> nombre: <b>'.$rows['nombre'].'</b> dont <b>'.$membre.'</b> membre(s) et <b>'.$respo.'</b> responsable(s) '.$carte.$download.$supprimer.$checkbox.'<span class="'.$class.'">'.$rows['statut'].'</span></li>';
                              }
                            ?>
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