<?php
session_start();
include_once('src/control/connexion.php'); 
$titre = 'Liste';
$page = 'Export';
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Liste des <span class="table-project-n">membres</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Classique</option>
                                          <option value="all">Tous</option>
                                          <option value="selected">Selection</option>
                                        </select>
                                                        </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="no">#</th>
                                                <th data-field="Matricule">Matricule</th>
                                                <th data-field="Nom" data-editable="true">Nom</th>
                                                <th data-field="Prénoms" data-editable="true">Prénoms</th>
                                                <th data-field="Date de naissance" data-editable="true">Date de Naissance</th>
                                                <th data-field="Lieu de naissance">Lieu de naissance</th>
                                                <th data-field="Sexe" data-editable="true">Sexe</th>
                                                <th data-field="Diocèse" data-editable="true">Diocèse</th>
                                                <th data-field="Instance" data-editable="true">Instance</th>
                                                <th data-field="Responsabilité" data-editable="true">Responsabilité</th>
                                                <th data-field="Contact" data-editable="true">Contact</th>
                                                <th data-field="email" data-editable="true">e-mail</th>
                                                <th data-field="NCNI" data-editable="true">Numéro CNI</th>
                                                <th data-field="groupe sanguin" data-editable="true">Groupe sanguin</th>
                                                <th data-field="Photo" data-editable="true">Photo</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $req = "select nom, prenom, contact, sexe, date, lieu, photo, denomination, statut, sang, cni, email, matricule, diocese.libelle as diocese from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id inner join diocese on diocese.id = instance.iddiocese order by nom asc";
                                        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
                                        $i =0;
                                        while($rows=mysqli_fetch_assoc($fic))
                                        {
                                            $i++;
                                            echo'<tr>
                                                    <td></td>
                                                    <td>'.$i.'</td>
                                                    <td>'.$rows['matricule'].'</td>
                                                    <td>'.$rows['nom'].'</td>
                                                    <td>'.$rows['prenom'].'</td>
                                                    <td>'.$rows['date'].'</td>
                                                    <td>'.$rows['lieu'].'</td>
                                                    <td>'.$rows['sexe'].'</td>
                                                    <td>'.$rows['diocese'].'</td>
                                                    <td>'.$rows['denomination'].'</td>
                                                    <td>'.$rows['statut'].'</td>
                                                    <td>'.$rows['contact'].'</td>
                                                    <td>'.$rows['email'].'</td>
                                                    <td>'.$rows['cni'].'</td>
                                                    <td>'.$rows['sang'].'</td>
                                                    <td>'.$rows['photo'].'</td>
                                                    <td class="datatable-ct"><i class="fa fa-check"></i></td>
                                                </tr>';
                                        }
                                        ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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