<?php 
    session_start();
    include_once('../src/entity/Connexion.php');
    $connexion = new Connexion();
    if($connexion->connecter())
    {
        $query = "SELECT * FROM formation f INNER JOIN blogueur b ON f.auteur = b.id_user ORDER BY date, id DESC";
        $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
    }
?>
<!doctype html>
<html lang="fr">

<?php include_once('include/head.php'); ?>

    <body class="theme-blue">

        <!-- Demo page code -->

        <script type="text/javascript">
            $(function() {
                var match = document.cookie.match(new RegExp('color=([^;]+)'));
                if(match) var color = match[1];
                if(color) {
                    $('body').removeClass(function (index, css) {
                        return (css.match (/\btheme-\S+/g) || []).join(' ')
                    })
                    $('body').addClass('theme-' + color);
                }

                $('[data-popover="true"]').popover({html: true});
                
            });
        </script>

        <style type="text/css">
            #line-chart {
                height:300px;
                width:800px;
                margin: 0px auto;
                margin-top: 1em;
            }
            .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
                color: #fff;
            }
        </style>

        <script type="text/javascript">
            $(function() {
                var uls = $('.sidebar-nav > ul > *').clone();
                uls.addClass('visible-xs');
                $('#main-menu').append(uls.clone());
            });
        </script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    

        <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
        <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
        <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
        <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
        <!--[if (gt IE 9)|!(IE)]><!--> 
        
        <!--<![endif]-->

        <?php include_once('include/header.php'); ?>
        
        <?php include_once('include/menu.php'); ?>
        
        <div class="content">
            <div class="header">
                <!--div class="stats">
                    <p class="stat"><span class="label label-info">5</span> Tickets</p>
                    <p class="stat"><span class="label label-success">27</span> Tasks</p>
                    <p class="stat"><span class="label label-danger">15</span> Overdue</p>
                </div-->

                <h1 class="page-title">Espace Membre</h1>
                <ul class="breadcrumb">
                    <li><a href="index.html">Accueil</a> </li>
                    <li class="active">Formation</li>
                </ul>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">

                        <div class="widget">
                            <ul class="cards list-group">
                                <?php 
                                while($formation = mysqli_fetch_assoc($result))
                                {
                                    switch ($formation['type']) {
                                        case "Doctrinale":
                                            $color = 'primary';
                                            break;
                                        case "Humaine":
                                            $color = 'info';
                                            break;
                                        case "Spirituelle":
                                            $color = 'warning';
                                            break;
                                        case "Technique":
                                            $color = 'danger';
                                            break;
                                    }
                                    echo'<li class="list-group-item">
                                            <p class="label label-'.$color.' header-label">'.$formation['titre'].'</p>
                                            <div class="img pull-left padding-right">
                                                <!--img src="images/faces/1b.png" style="width: 40px;"-->
                                                <div class="label label-'.$color.' img-label">'.$formation['type'].'</div>
                                            </div>
                                            <p class="info-text">'.$formation['description'].'</p>
                                            <div>
                                                <p class="time pull-right text-sm">'.substr($formation["date"],8,2).'/'.substr($formation["date"],5,2).'/'.substr($formation["date"],0,4).'</p>
                                                <!--a href="#"><span class="text-sm padding-right">15 <i class="fa fa-thumb-tack "></i></span></a>
                                                <a href="#"><span class="text-sm padding-right">27 <i class="fa fa-bullhorn "></i></span></a-->
                                                <a href="../blog/formation/formation-'.$formation['id'].'.pdf" target="_blank"><span class="text-sm padding-right">Télécharger <i class="fa fa-download "></i></span></a>
                                            </div>
                                        </li>';
                                }
                                ?>
                            </ul>
                        </div>

                    </div>

                </div>

                <?php include_once('include/footer.php'); ?>

            </div>
        </div>

        <script src="lib/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript">
            $("[rel=tooltip]").tooltip();
            $(function() {
                $('.demo-cancel-click').click(function(){return false;});
            });
        </script>
  
    </body>
</html>
