<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Admin Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <form method="post">
                <h2 class="text-center">Admin Connexion</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" id="pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="password" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" name="formsend" class="btn btn-primary btn-block" id="formsend" value="Connexion">
                </div>   
        </form>
        <br>&ensp;&ensp;&ensp;&ensp;<a href="index.php">Revenir à la page d'accueil</a>
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

                if(!empty($password) && !empty($pseudo)){

                    include 'database.php';
                    global $db;

                    $requser = $db->prepare("SELECT * FROM admin WHERE pseudo = :pseudo");
                    $requser->execute(['pseudo' => $pseudo]);
                    $result = $requser->fetch();

                    if($result == true){
                        if(password_verify($password, $result['password'])){
                            $_SESSION['id'] = $result['id'];
                            $_SESSION['pseudo'] = $result['pseudo'];
                            $_SESSION['email'] = $result['email'];
                            header("Location: adminedit.php?id=".$_SESSION['id']);
                        }else{
                            echo " Mot de passe incorrect";
                        }
                    }else{
                        echo " Le compte administrateur portant le pseudo ". $pseudo ." n'existe pas";
                    }
                }else{
                    echo " Veuillez remplir tous les champs";
                }
            }


        ?>
</body>
</html>