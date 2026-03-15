<?php
try {
    $db = new PDO("sqlite:" . __DIR__ . "/edumaths.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables
    $db->exec("CREATE TABLE IF NOT EXISTS user (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        pseudo TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS prof (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        image TEXT,
        description TEXT
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS cours (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        prof TEXT,
        duration INTEGER,
        level TEXT,
        pdflink TEXT,
        image TEXT,
        image2 TEXT,
        description TEXT
    )");

    // Seed mock data
    // Professors
    $db->exec("INSERT INTO prof (name, image, description) VALUES ('Jean Dupont', 'img/team-1.jpg', 'Expert en Algèbre avec 15 ans d''expérience.')");
    $db->exec("INSERT INTO prof (name, image, description) VALUES ('Marie Curie', 'img/team-2.jpg', 'Spécialiste de la Géométrie et des probabilités.')");

    // Courses
    $db->exec("INSERT INTO cours (name, prof, duration, level, pdflink, image, image2, description) VALUES 
        ('Algèbre Linéaire', 'Jean Dupont', 45, 'Seconde', 'cours/algebre.pdf', 'img/course-1.jpg', 'img/course-1.jpg', 'Introduction aux matrices et aux espaces vectoriels.')");
    $db->exec("INSERT INTO cours (name, prof, duration, level, pdflink, image, image2, description) VALUES 
        ('Géométrie Différentielle', 'Marie Curie', 60, 'Première', 'cours/geometrie.pdf', 'img/course-2.jpg', 'img/course-2.jpg', 'Étude des courbes et des surfaces.')");
    $db->exec("INSERT INTO cours (name, prof, duration, level, pdflink, image, image2, description) VALUES 
        ('Probabilités', 'Marie Curie', 30, 'Terminale', 'cours/proba.pdf', 'img/course-3.jpg', 'img/course-3.jpg', 'Calcul de probabilités et statistiques.')");

    // User
    $options = ['cost' => 12];
    $hashpass = password_hash('password123', PASSWORD_BCRYPT, $options);
    $db->exec("INSERT INTO user (pseudo, email, password) VALUES ('nayl', 'nayl@example.com', '$hashpass')");

    echo "Database initialized and seeded successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
