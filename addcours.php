<?php

session_start();

include 'database.php';
global $db;

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $db->prepare("SELECT * FROM admin WHERE id = ?");
    $requser->execute(array($getid));
    $result = $requser->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Ajouter un cours</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<form method="post">
                <h2 class="text-center">Ajouter un cours</h2>
                <div class="form-group">
                    <input type="text" name="image" class="form-control" placeholder="Lien de l'image du cours" id="image" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="image2" class="form-control" placeholder="Lien de la seconde image du cours" id="image2" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nom du cours" id="name" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="level" class="form-control" placeholder="Niveau" id="level" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Description du cours" id="description" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="duration" class="form-control" placeholder="Durée du cours" id="duration" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="pdflink" class="form-control" placeholder="Lien pdf du cours" id="pdflink" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="vidlink" class="form-control" placeholder="Vidéo du cours" id="vidlink" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" name="formsend" class="btn btn-primary btn-block" id="formsend" value="Créer">
                </div>   
        </form>
        <br>&ensp;&ensp;&ensp;&ensp;<a href="index.php">Revenir à la page d'accueil</a>&ensp;&ensp;&ensp;&ensp;<a href="adminedit.php?id=<?php echo $_SESSION['id'];?>">Revenir à la page admin</a>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        <?php
        	if(isset($_POST['formsend'])){
        		extract($_POST);

        		if(!empty($name) && !empty($vidlink) && !empty($image) && !empty($description) && !empty($image2) && !empty($pdflink) && !empty($duration) && !empty($level)){

                    $q = $db->prepare('INSERT INTO cours(name, image, image2, description, vidlink, pdflink, duration, level, prof) VALUES(:name, :image, :image2, :description, :vidlink, :pdflink, :duration, :level, :prof)');
        			$q->execute(['image' => $image, 'image2' => $image2, 'image3' => $image3,'name' => $name, 'category' => $category, 'description' => $description, 'caracteristique' => $caracteristique,'price' => $price]);
        			header("Location: adminedit.php?id=".$_SESSION['id']);


        		}else{
        			echo " Veuillez remplir tous les champs";
        		}
        	}


        ?>
</body>
</html>
<?php
	}
?>