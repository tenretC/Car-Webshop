<?php
include './admin/lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>Maserati Online Shop</title>

	<!-- Animate.css -->
	<link rel="stylesheet" href="admin/lib/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="admin/lib/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="admin/lib/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="admin/lib/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="admin/lib/css/style.css">

	<!-- Modernizr JS -->
	<script src="admin/lib/js/modernizr-2.6.2.min.js"></script>
	<!-- jQuery -->
	<script src="admin/lib/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="admin/lib/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="admin/lib/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="admin/lib/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="admin/lib/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="admin/lib/js/main.js"></script>
        
    <script src="admin/lib/js/dist/jquery.validate.js"></script>
        
    <script src="admin/lib/js/gt_functionsVal.js"></script>
        
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container-wrap">
                    <nav>
                            <?php
                            if (file_exists("./lib/php/menu.php")) {
                                require("./lib/php/menu.php");
                            }
                            ?>
                    </nav>
            </div>
        </nav>
        <div class="container-wrap">
                <section>
                        <?php
                        /* le contenu change en fonction de la navigation */
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "pages/accueil.php";
                        } else {

                            if (isset($_GET['page'])) {
                                //print $_GET['page'];
                                $_SESSION['page'] = "pages/" . $_GET['page'];
                            }
                        }

                        //print $_SESSION['page'];  
                        if (file_exists($_SESSION['page'])) {
                            require $_SESSION['page'];
                        } else {
                            print "Oops, cette page n'existe pas";
                        }
                        ?>	
                    </section>
        </div><!-- END container-wrap -->

        <div class="container-wrap">
            <footer id="fh5co-footer" role="contentinfo">
                <nav>
                            <?php
                            if (file_exists("./lib/php/footer.php")) {
                                require("./lib/php/footer.php");
                            }
                            ?>
                    </nav>
            </footer>
        </div><!-- END container-wrap -->
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	</body>
</html>