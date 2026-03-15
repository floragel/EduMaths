<?php
try {
    $dsn = "mysql:host=localhost";
    $user = "root";
    $pass = "root";
    $pdo = new PDO($dsn, $user, $pass);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
