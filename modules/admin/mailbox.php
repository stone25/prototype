<?php
$titre = 'Mail';
$page = 'Mailbox';
?>

<!doctype html>
<html class="no-js" lang="fr">

<!-- ***** Head Area Start ***** -->
<?php include_once('include/head.php'); ?>
<!-- ***** Head Area End ***** -->

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

        <div class="mailbox-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="hpanel responsive-mg-b-30">
                            <div class="panel-body">

                                <ul class="mailbox-list">
                                    <li class="active">
                                        <a href="#">
												<span class="pull-right">12</span>
												<i class="fa fa-envelope"></i> Inbox
											</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-paper-plane"></i> Sent</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pencil"></i> Draft</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-trash"></i> Trash</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-plane text-danger"></i> Travel</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart text-warning"></i> Finance</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users text-info"></i> Social</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-tag text-success"></i> Promos</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-flag text-primary"></i> Updates</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-gears"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-info-circle"></i> Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel">
                            <div class="panel-heading hbuilt mailbox-hd">
                                <div class="text-center p-xs font-normal">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="Search email in your inbox..."> <span class="input-group-btn active-hook"> <button type="button" class="btn btn-sm btn-default">Search
											</button> </span></div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-exclamation"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-tag"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-4 mailbox-pagination">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                            <button class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button>
                                            <button class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive ib-tb">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Jeremy Massey</a></td>
                                                <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                                </td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Tue, Nov 25</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Marshall Horne</a></td>
                                                <td><a href="#">Praesent nec nisl sed neque ornare maximus at ac enim.</a>
                                                </td>
                                                <td></td>
                                                <td class="text-right mail-date">Wed, Jan 13</td>
                                            </tr>
                                            <tr class="active">
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Grant Franco</a> <span class="label label-warning">Finance</span></td>
                                                <td><a href="#">Etiam maximus tellus a turpis tempor mollis.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Mon, Oct 19</td>
                                            </tr>
                                            <tr class="unread active">
                                                <td class="">
                                                    <div class="checkbox checkbox-single">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Ferdinand Meadows</a></td>
                                                <td><a href="#">Aenean hendrerit ligula eget augue gravida semper.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sat, Aug 29</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox checkbox-single">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Ivor Rios</a> <span class="label label-info">Social</span>
                                                </td>
                                                <td><a href="#">Sed quis augue in nunc venenatis finibus.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sat, Dec 12</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Maxwell Murphy</a></td>
                                                <td><a href="#">Quisque eu tortor quis justo viverra cursus.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, May 17</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Henry Patterson</a></td>
                                                <td><a href="#">Aliquam nec justo interdum, ornare mi non, elementum
														lacus.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Thu, Aug 06</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Brent Rasmussen</a></td>
                                                <td><a href="#">Nam nec turpis sed quam tristique sodales.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, Nov 15</td>
                                            </tr>
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Joseph Hurley</a></td>
                                                <td><a href="#">Nullam tempus leo id urna sagittis blandit.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sun, Aug 10</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Alan Matthews</a></td>
                                                <td><a href="#">Quisque quis turpis ac quam sagittis scelerisque vel ut
														urna.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, Mar 27</td>
                                            </tr>
                                            <tr class="active">
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Colby Lynch</a> <span class="label label-danger">Travel</span></td>
                                                <td><a href="#">Donec non enim pulvinar, ultrices metus eget, condimentum
														mi.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Thu, Dec 31</td>
                                            </tr>
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Jeremy Massey</a></td>
                                                <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                                </td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Tue, Nov 25</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Marshall Horne</a></td>
                                                <td><a href="#">Praesent nec nisl sed neque ornare maximus at ac enim.</a>
                                                </td>
                                                <td></td>
                                                <td class="text-right mail-date">Wed, Jan 13</td>
                                            </tr>
                                            <tr class="active">
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Grant Franco</a> <span class="label label-warning">Finance</span></td>
                                                <td><a href="#">Etiam maximus tellus a turpis tempor mollis.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Mon, Oct 19</td>
                                            </tr>
                                            <tr class="unread active">
                                                <td class="">
                                                    <div class="checkbox checkbox-single">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Ferdinand Meadows</a></td>
                                                <td><a href="#">Aenean hendrerit ligula eget augue gravida semper.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sat, Aug 29</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox checkbox-single">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Ivor Rios</a> <span class="label label-info">Social</span>
                                                </td>
                                                <td><a href="#">Sed quis augue in nunc venenatis finibus.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sat, Dec 12</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Maxwell Murphy</a></td>
                                                <td><a href="#">Quisque eu tortor quis justo viverra cursus.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, May 17</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Henry Patterson</a></td>
                                                <td><a href="#">Aliquam nec justo interdum, ornare mi non, elementum
														lacus.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Thu, Aug 06</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Brent Rasmussen</a></td>
                                                <td><a href="#">Nam nec turpis sed quam tristique sodales.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, Nov 15</td>
                                            </tr>
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Joseph Hurley</a></td>
                                                <td><a href="#">Nullam tempus leo id urna sagittis blandit.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date">Sun, Aug 10</td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Alan Matthews</a></td>
                                                <td><a href="#">Quisque quis turpis ac quam sagittis scelerisque vel ut
														urna.</a></td>
                                                <td></td>
                                                <td class="text-right mail-date">Sun, Mar 27</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer ib-ml-ft">
                                <i class="fa fa-eye"> </i> 6 unread
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>