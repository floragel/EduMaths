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

    $getid2 = intval($_GET['id']);
	$requser2 = $db->prepare("SELECT * FROM cours WHERE id = ?");
    $requser2->execute(array($getid2));
    $result2 = $requser2->fetch();

    /* $req_produit_exist = $db->prepare('SELECT * FROM produit WHERE ?');
    $req_produit_exist->execute(array($result2['id']));
    $produit_existe = $req_produit_exist->rowCount(); */

    $query = "SELECT * FROM cours";
	$data = $db->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Profil Administrateur de <?php echo $result['pseudo']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>	<?php
        	if($result['id'] == $_SESSION['id']){
		?>
		<br><h2 class="text-center">Profil Administrateur de <?php echo $result['pseudo']; ?></h2><br>
		<!-- debut de code d'edit -->
		<h2 align="left">&ensp;&ensp;Info :</h2><br>
		<!-- <h2 align="left">&ensp;&ensp;Nombres de produit : <?php echo $produit_existe; ?></h2><br> -->
		&ensp;&ensp;&ensp;&ensp;<a href="addcours.php?id=<?php echo $_SESSION['id']; ?>" style="font-size: 35px;">ajouter un cours</a><br>
		<?php
			foreach ($data as $row) {
		?>
		<br><br><br>
		<div style="display: inline-block;">
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<div class="produit" align="left" style="display: inline-block;">
				<img style="display: inline-block;" src="<?php echo $row['image'];?>" width="200" height="150"><br><br>
				<center><h3 style="display: inline-block;"><?php echo $row['name']; ?></h3><br>
				<a href="supprimproduct.php?id=<?php echo $row['id'];?>">Supprimer</a>&ensp;&ensp;&ensp;<a href="modifproduct.php?id=<?php echo $row['id'];?>">Modifier</a></center>
			</div>
		</div>
		<?php
			}
		?>
		<!-- fin de code d'edit -->
		<br><br><br><br>&ensp;&ensp;&ensp;&ensp;<a href="deconnexion.php" style="font-size: 30px;">Se déconnecter</a>&ensp;&ensp;&ensp;&ensp;<a href="index.php" style="font-size: 30px;">Revenir à la page d'accueil</a><br><br>
		
		<?php     	
        	}else{
        		echo "Vous n'avez pas le droit d'être ici ! :(";
        	}	
        ?>
</body>
</html>
<?php
}
?>