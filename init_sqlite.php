<?php
try {
    $db = new PDO("sqlite:" . __DIR__ . "/edumaths.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables
    $db->exec("DROP TABLE IF EXISTS user");
    $db->exec("DROP TABLE IF EXISTS prof");
    $db->exec("DROP TABLE IF EXISTS cours");

    $db->exec("CREATE TABLE user (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        pseudo TEXT NOT NULL,
        email TEXT NOT NULL,
        password TEXT NOT NULL
    )");

    $db->exec("CREATE TABLE prof (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        image TEXT,
        description TEXT
    )");

    $db->exec("CREATE TABLE cours (
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

    // Data for courses
    $courses = [
        ['Algèbre Linéaire', 'Julie Leroy', 45, 'Seconde', 'cours/algebre.pdf', 'img/course_algebre_lineaire.png', 'Introduction aux matrices et aux espaces vectoriels.'],
        ['Théorème de Pythagore', 'Mme Sophie Martin', 30, '4ème', 'cours/pythagore.pdf', 'img/course_pythagore.png', 'Maîtriser le calcul des côtés dans un triangle rectangle.'],
        ['Calcul Littéral', 'Julie Leroy', 40, '3ème', 'cours/litteral.pdf', 'img/course_calcul_litteral.png', 'Développement, factorisation et identités remarquables.'],
        ['Fonctions Affines', 'Dr. Marc Vasseur', 50, '2nde', 'cours/fonctions.pdf', 'img/course_fonctions_affines.png', 'Représentation graphique et étude de variations.'],
        ['Probabilités', 'Luc Durand', 55, '1ère', 'cours/proba.pdf', 'img/course_probabilites.png', 'Calcul de chances et arbres de probabilité.'],
        ['Géométrie dans l\'Espace', 'Mme Sophie Martin', 60, 'Terminale', 'cours/geometrie.pdf', 'img/course_geometrie_espace.png', 'Droites et plans dans l\'espace, calculs de volumes.'],
    ];

    foreach ($courses as $c) {
        $stmt = $db->prepare("INSERT INTO cours (name, prof, duration, level, pdflink, image, image2, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$c[0], $c[1], $c[2], $c[3], $c[4], $c[5], $c[5], $c[6]]);
    }

    // Data for professors
    $profs = [
        ['Dr. Marc Vasseur', 'img/prof_1.png', 'Docteur en Mathématiques appliquées, spécialisé en analyse numérique pour le lycée.'],
        ['Mme Sophie Martin', 'img/prof_2.png', 'Professeure agrégée, experte en géométrie et pédagogie pour le collège.'],
        ['Julie Leroy', 'img/prof_3.png', 'Enseignante dynamique spécialisée dans les bases fondamentales des mathématiques.'],
        ['Luc Durand', 'img/prof_4.png', 'Enseignant passionné par les probabilités et les statistiques de la vie réelle.'],
    ];

    foreach ($profs as $p) {
        $stmt = $db->prepare("INSERT INTO prof (name, image, description) VALUES (?, ?, ?)");
        $stmt->execute($p);
    }

    // User
    $options = ['cost' => 12];
    $hashpass = password_hash('password123', PASSWORD_BCRYPT, $options);
    $db->exec("INSERT INTO user (pseudo, email, password) VALUES ('nayl', 'nayl@example.com', '$hashpass')");

    echo "Database initialized and seeded successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
