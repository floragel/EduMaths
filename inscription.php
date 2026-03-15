<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Edukate - Online Education Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/logo.ico" rel="icon">

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
                <a href="inscription.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">S'inscrire</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">S'inscrire</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Inscription</p>
            </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Notre localisation</h4>
                                <p class="m-0">Médiathèque Jean Védrine</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Notre Email</h4>
                                <p class="m-0">info@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <a href="connexion.php" class="d-inline-block position-relative text-secondary text-uppercase pb-2" style="text-decoration: underline;">Vous avez déjà un compte</a>
                        <h1 class="display-4">S'inscrire</h1>
                    </div>
                    <div class="contact-form">
                        <form method="post">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input name="pseudo" id="pseudo" type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Pseudo" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input name="email" id="email" type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="password" id="password" type="password" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Mot de Passe" required="required">
                            </div>
                            <div class="form-group">
                                <input name="cpassword" id="cpassword" type="password" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Confirmez Mot de Passe" required="required">
                            </div>
                            <div>
                                <br>
                                <input name="formsend" id="formsend" class="btn btn-primary py-3 px-5" type="submit" value="S'inscrire">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php
        	if(isset($_POST['formsend'])){
        		extract($_POST);

        		if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){
        			if($password == $cpassword){
        				$options = ['cost' => 12,];
        				$hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

        				include 'database.php';
        				global $db;

        				$c = $db->prepare("SELECT email FROM user WHERE email = :email");
        				$c->execute(['email' => $email]);
        				$resulte = $c->rowCount();

        				$j = $db->prepare("SELECT pseudo FROM user WHERE pseudo = :pseudo");
        				$j->execute(['pseudo' => $pseudo]);
        				$resultp = $j->rowCount();

        				if($resulte == 0 && $resultp == 0){
        					$q = $db->prepare('INSERT INTO user(pseudo, email, password) VALUES(:pseudo, :email, :password)');
        					$q->execute(['pseudo' => $pseudo,'email' => $email, 'password' => $hashpass]);
        					echo " Le compte a été crée";
                            echo '<br><br><center><a style="border-radius: 6px;padding: 8px; font-size: 30px; background-color: white; color: black;" href="connexion.php">Se connecter</a></center>';
        				}elseif($resulte >= 1){
        					echo " Cette email est déja utilisé !";
        				}elseif($resultp >= 1){
        					echo " Ce pseudo est déja utilisé !";
        				}
        			}else{
        				echo " Les mots de passe ne corresponde pas";
        			}
        		}else{
        			echo " Veuillez remplir tous les champs";
        		}
        	}


        ?>

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