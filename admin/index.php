<?php
include './lib/php/adm_liste_include.php';
include './lib/php/dbConnectMysql.php';
include './lib/php/classes/Connexion.class.php';
include './lib/php/classes/VoitureDB.class.php';
include './lib/php/fpdf/fpdf.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<title>Maserati Online Shop</title>

	<!-- Animate.css -->
	<link rel="stylesheet" href="lib/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="lib/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="lib/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="lib/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="lib/css/style.css">

	<!-- Modernizr JS -->
	<script src="lib/js/modernizr-2.6.2.min.js"></script>
	<!-- jQuery -->
	<script src="lib/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="lib/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="lib/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="lib/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="lib/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="lib/js/main.js"></script>
        
    <script src="lib/js/dist/jquery.validate.js"></script>
        
    <script src="lib/js/gt_functionsVal.js"></script>

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container-wrap">
                    <nav>
                            <?php
                            if (file_exists("./lib/php/a_menu.php")) {
                                require("./lib/php/a_menu.php");
                            }
                            ?>
                    </nav>
            </div>
        </nav>
        <div class="container-wrap">
                <section>
                        <?php
                        //on arrive sur le site
                        if(!isset($_SESSION['admin'])){
                            $_SESSION['page'] = "admin_login";
                        }
                        else{
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "accueil_admin";
                            }

                            //on a cliqué sur un lien du menu
                            if (isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                        }
                        $path = "./pages/" . $_SESSION['page'] . ".php";
                        if (file_exists($path)) {
                            include ($path);
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
                            if (file_exists("./lib/php/a_footer.php")) {
                                require("./lib/php/a_footer.php");
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