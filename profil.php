<?php

session_start();

include 'database.php';
global $db;

	$getid = intval($_GET['id']);
	$requser = $db->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($getid));
    $result = $requser->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Profil de <?php echo $result['pseudo']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: #367ee6;
		}
		h2{
			color: white;
		}
		a{
			color: #C1BAB8;
		}
		a:hover{
            color: #d10024;
        }
	</style>
</head>
<body>
		<br><h2 class="text-center">Profil de <?php echo $result['pseudo']; ?></h2><br>
		<h2 align="left">&ensp;&ensp;Info :</h2><br>
		&ensp;&ensp;&ensp;&ensp;<img src="membres/avatars/<?php echo $_SESSION['id']; ?>.jpg" width="150" height="120"><br><br>
		<h2 align="left">&ensp;&ensp;Email : <?php echo $result['email']; ?></h2><br>
		<!--[code]>&ensp;&ensp;&ensp;&ensp;<a href="editionprofil.php">Editer mon profil</a><![code]-->
		&ensp;&ensp;&ensp;&ensp;<a href="deconnexion.php">Se déconnecter</a>&ensp;&ensp;&ensp;&ensp;<a href="<?php echo "photoprofil.php?id=".$_SESSION['id'];?>">Mettre une photo de profil/ Changer sa photo de Profil</a>&ensp;&ensp;&ensp;&ensp;<a href="index.php">Revenir à la page d'accueil</a>
	
</body>
</html>