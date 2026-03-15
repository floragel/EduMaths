<?php

session_start();

include 'database.php';
global $db;

$query = "SELECT * FROM cours";
$data = $db->query($query);

$par = $db->prepare("SELECT * FROM cours WHERE id = :id");
$par->execute(['id' => $_GET['id']]);
$result = $par->fetch();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Edukate - Online Education Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edumaths</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="course.php" class="nav-item nav-link">Courses</a>
		            <a href="team.php" class="nav-item nav-link">Instructors</a>
                </div>
                <!--  <a href="inscription.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">S'inscrire</a> -->
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Detail Du Cours</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course Detail</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Détail du cours</h6>
                            <h1 class="display-4"><?php echo $result['name']; ?></h1>
                        </div>
                        <img class="img-fluid rounded w-100 mb-4" src="<?php echo $result['image2']; ?>" alt="Image">
                        
                        <h3 class="mb-4">Description du cours</h3>
                        <p><?php echo $result['description']; ?></p>
                        
                        <div class="row pt-3">
                            <div class="col-md-6s mb-4 px-3">
                                <h4 class="mb-3">Objectifs d'apprentissage</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fa fa-check text-primary mr-2"></i>Maîtriser les concepts fondamentaux</li>
                                    <li class="mb-2"><i class="fa fa-check text-primary mr-2"></i>Appliquer les formules dans des cas concrets</li>
                                    <li class="mb-2"><i class="fa fa-check text-primary mr-2"></i>Se préparer aux examens et contrôles</li>
                                </ul>
                            </div>
                            <div class="col-md-6s mb-4 px-3">
                                <h4 class="mb-3">Programme du cours</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Introduction et contexte historique</li>
                                    <li class="mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Démonstrations et exercices pratiques</li>
                                    <li class="mb-2"><i class="fa fa-angle-right text-primary mr-2"></i>Conclusion et évaluation finale</li>
                                </ul>
                            </div>
                        </div>
                    </div>
               </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="bg-primary mb-5 py-3">
                        <h3 class="text-white py-3 px-4 m-0">Détail Du Cours</h3>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Prof</h6>
                            <h6 class="text-white my-3"><?php echo $result['prof']; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Durée</h6>
                            <h6 class="text-white my-3"><?php echo $result['duration']; ?> Min</h6>
                        </div>
                        <div class="d-flex justify-content-between border-bottom px-4">
                            <h6 class="text-white my-3">Niveau</h6>
                            <h6 class="text-white my-3"><?php echo $result['level']; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="text-white my-3">Langage</h6>
                            <h6 class="text-white my-3">Français</h6>
                        </div>
                        <div class="py-3 px-4">
                            <a class="btn btn-block btn-secondary py-3 px-5" href="<?php echo $result['pdflink']; ?>">Suivre le cours</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


<!-- Footer Start -->
<div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Edumaths</h1>
                    </a>
                    <p class="m-0">Accusam nonumy clita sed rebum kasd eirmod elitr. Ipsum ea lorem at et diam est, tempor rebum ipsum sit ea tempor stet et consetetur dolores. Justo stet diam ipsum lorem vero clita diam</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Nos Cours</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Research</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>