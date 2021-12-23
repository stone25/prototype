<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="accueil.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><a href="accueil.php"><img src="img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a title="Landing Page" href="accueil.php" aria-expanded="false">
                            <span class="educate-icon educate-home icon-wrap"></span>
                            <span class="mini-click-non">Accueil</span>
                        </a>
                    </li>
                    <!--li>
                        <a title="Landing Page" href="calendrier.php" aria-expanded="false">
                            <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span>
                            <span class="mini-click-non">Calendrier</span>
                        </a>
                    </li-->
                    <?php 
                        if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                        {
                            echo'<li>
                                    <a title="Landing Page" href="commande.php" aria-expanded="false">
                                        <span class="educate-icon educate-charts icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Nouvelle commande</span>
                                    </a>
                                </li>';
                        }

                        if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                        {
                            echo'<li>
                                    <a title="Landing Page" href="commandes.php" aria-expanded="false">
                                        <span class="educate-icon educate-charts icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Liste des commandes</span>
                                    </a>
                                </li>';
                        }

                        if($_SESSION["usertype"]=='Bureau National')
                        {
                            echo'<li>
                                    <a title="Landing Page" href="point_diocese.php" aria-expanded="false">
                                        <span class="educate-icon educate-charts icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Points des cartes</span>
                                    </a>
                                </li>';
                        }

                        if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                        {
                            echo'<li>
                                    <a title="Landing Page" href="correction.php" aria-expanded="false">
                                        <span class="educate-icon educate-interface icon-wrap" aria-hidden="true"></span>
                                        <span class="mini-click-non">Correction</span>
                                    </a>
                                </li>';
                        }
                    ?>
                    
                    
                    <li>
                    <a  href="jeciste.php" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Membres</span></a>
                        <!--a class="has-arrow" href="jeciste.php" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Membres</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="All Professors" href="jeciste.php"><span class="mini-sub-pro">Jécistes</span></a></li>
                            <li><a title="Add Professor" href="responsable.php"><span class="mini-sub-pro">Responsables</span></a></li>
                            <li><a title="Edit Professor" href="encadreur.php"><span class="mini-sub-pro">Encadreurs</span></a></li>
                            <li><a title="Edit Professor" href="aine.php"><span class="mini-sub-pro">Aînés</span></a></li>
                            <li><a title="Professor Profile" href="aumonier.php"><span class="mini-sub-pro">Aumônier</span></a></li>
                        </ul-->
                    </li>
                    
                    <li>
                        <a title="Landing Page" href="../blog/index.php" aria-expanded="false">
                            <span class="educate-icon educate-student" aria-hidden="true"></span>
                            <span class="mini-click-non">Blog</span>
                        </a>
                    </li>
                    
                    <!--li>
                        <a title="Landing Page" href="mailbox.php" aria-expanded="false">
                            <span class="educate-icon educate-message icon-wrap" aria-hidden="true"></span>
                            <span class="mini-click-non">Mail</span>
                        </a>
                    </li-->

                    <li>
                        <a title="Landing Page" href="../membre/accueil.php" target="_blank" aria-expanded="false">
                            <span class="educate-icon educate-pages icon-wrap" aria-hidden="true"></span>
                            <span class="mini-click-non">Espace Membre</span>
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </nav>
</div>