<div class="sidebar-nav">
    <ul>
        <li>
            <a href="accueil.php" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-home"></i> Accueil</a>
        </li>
        <!--li>
            <ul class="dashboard-menu nav nav-list collapse in">
                <li><a href="index.html"><span class="fa fa-caret-right"></span> Main</a></li>
                <li ><a href="users.html"><span class="fa fa-caret-right"></span> User List</a></li>
                <li ><a href="user.html"><span class="fa fa-caret-right"></span> User Profile</a></li>
                <li ><a href="media.html"><span class="fa fa-caret-right"></span> Media</a></li>
                <li ><a href="calendar.html"><span class="fa fa-caret-right"></span> Calendar</a></li>
            </ul>
        </li-->
        <li>
            <a href="membre.php" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-users"></i> Membres <!--span class="label label-info">+3</span--></a>
        </li>
        <li>
            <a href="formation.php" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-graduation-cap"></i> Formations <!--span class="label label-info">+3</span--></a>
        </li>
        <!--li>
            <a href="#" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-user"></i> Profil </a>
        </li-->
        <li>
            <a href="information.php" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-info"></i> Informations <!--span class="label label-info">+3</span--></a>
        </li>
        <li>
            <a href="http://jec-ci.com/" class="nav-header" target="blank"><i class="fa fa-fw fa-external-link"></i> Site JEC Côte d'Ivoire</a>
        </li>
        <?php 
            if (isset($_SESSION['usertype']) && ($_SESSION['usertype']=='Bureau National' || $_SESSION['usertype']=='Bureau Diocésain'))
            {
                echo'<li>
                        <a href="../admin/accueil.php" class="nav-header" target="blank"><i class="fa fa-fw fa-external-link"></i> Espace Responsable</a>
                    </li>';
            }
        ?>
    </ul>
</div>