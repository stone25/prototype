<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user/<?php echo $_SESSION["user"]["photo"]; ?>" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $_SESSION["user"]["nom"]; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>En ligne</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <!--form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form-->
    <ul class="nav menu">
        <li class="active"><a href="home.php"><em class="fa fa-dashboard">&nbsp;</em> Tableau de bord</a></li>
        
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
            <em class="fa fa-users">&nbsp;</em> Blog <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="new_article.php">
                    <span class="fa fa-plus">&nbsp;</span> Nouvel article
                </a></li>
                <li><a class="" href="list_article.php">
                    <span class="fa fa-list">&nbsp;</span> Liste des articles
                </a></li>
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
            <em class="fa fa-suitcase">&nbsp;</em> Projet <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="new_projet.php">
                    <span class="fa fa-plus">&nbsp;</span> Nouveau projet
                </a></li>
                <li><a class="" href="list_projet.php">
                    <span class="fa fa-list">&nbsp;</span> Liste des projets
                </a></li>
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
            <em class="fa fa-suitcase">&nbsp;</em> Activité <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li><a class="" href="new_activite.php">
                    <span class="fa fa-plus">&nbsp;</span> Nouvelle activité
                </a></li>
                <li><a class="" href="list_activite.php">
                    <span class="fa fa-list">&nbsp;</span> Liste des activités
                </a></li>
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
            <em class="fa fa-suitcase">&nbsp;</em> Photo <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li><a class="" href="new_photo.php">
                    <span class="fa fa-plus">&nbsp;</span> Nouvelle photo
                </a></li>
                <li><a class="" href="list_photo.php">
                    <span class="fa fa-list">&nbsp;</span> Liste des photo
                </a></li>
            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-5">
            <em class="fa fa-suitcase">&nbsp;</em> Formation <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-5">
                <li><a class="" href="new_formation.php">
                    <span class="fa fa-plus">&nbsp;</span> Nouvelle formation
                </a></li>
                <li><a class="" href="list_formation.php">
                    <span class="fa fa-list">&nbsp;</span> Liste des formations
                </a></li>
            </ul>
        </li>

        <li><a href="src/control/control_user.php?logout=1"><em class="fa fa-power-off">&nbsp;</em> Déconnexion</a></li>
    </ul>
</div>
<!--/.sidebar-->