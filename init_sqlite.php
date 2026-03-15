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
        [
            'Algèbre Linéaire', 
            'Julie Leroy', 
            45, 
            'Seconde', 
            'cours/algebre_lineaire.pdf', 
            'img/course_algebre_lineaire.png', 
            'Ce cours complet sur l\'algèbre linéaire vous permettra de maîtriser les concepts fondamentaux des matrices, des vecteurs et des systèmes d\'équations linéaires. Vous apprendrez à manipuler des espaces vectoriels, à calculer des déterminants et à comprendre les transformations linéaires. Idéal pour les élèves souhaitant approfondir leurs connaissances en mathématiques et se préparer aux études supérieures.'
        ],
        [
            'Théorème de Pythagore', 
            'Mme Sophie Martin', 
            30, 
            '4ème', 
            'cours/theoreme_pythagore.pdf', 
            'img/course_pythagore.png', 
            'Le théorème de Pythagore est la pierre angulaire de la géométrie plane. Dans ce module, nous explorerons ses applications pratiques, de la mesure de distances inaccessibles à la résolution de problèmes complexes dans des triangles rectangles. Le cours inclut de nombreux exercices interactifs et des démonstrations visuelles pour faciliter la compréhension et la mémorisation.'
        ],
        [
            'Calcul Littéral', 
            'Julie Leroy', 
            40, 
            '3ème', 
            'cours/calcul_litteral.pdf', 
            'img/course_calcul_litteral.png', 
            'Maîtrisez l\'art de manipuler les expressions algébriques. Ce cours couvre le développement, la factorisation, les identités remarquables et la résolution d\'équations du premier degré. À la fin de ce cours, le calcul littéral n\'aura plus de secret pour vous, vous permettant d\'aborder sereinement les chapitres plus avancés de l\'analyse mathématique.'
        ],
        [
            'Fonctions Affines', 
            'Dr. Marc Vasseur', 
            50, 
            '2nde', 
            'cours/fonctions_affines.pdf', 
            'img/course_fonctions_affines.png', 
            'Étude approfondie des fonctions de la forme f(x) = ax + b. Nous verrons comment interpréter le coefficient directeur et l\'ordonnée à l\'origine, comment tracer des représentations graphiques précises et comment utiliser ces fonctions pour modéliser des situations concrètes du quotidien. Un module essentiel pour comprendre les bases de l\'analyse fonctionnelle.'
        ],
        [
            'Probabilités', 
            'Luc Durand', 
            55, 
            '1ère', 
            'cours/probabilites.pdf', 
            'img/course_probabilites.png', 
            'Plongez dans le monde de l\'aléa et de l\'incertitude. Ce cours vous apprendra à calculer des probabilités simples et conditionnelles, à utiliser des arbres de probabilité et à comprendre les variables aléatoires. Nous explorerons des exemples concrets tirés des jeux de hasard, de la météorologie et des statistiques sociales pour rendre l\'apprentissage vivant et pertinent.'
        ],
        [
            'Géométrie dans l\'Espace', 
            'Mme Sophie Martin', 
            60, 
            'Terminale', 
            'cours/geometrie_espace.pdf', 
            'img/course_geometrie_espace.png', 
            'Prenez de la hauteur avec l\'étude des objets en trois dimensions. Ce cours traite des droites, des plans, des calculs de volumes complexes et de la géométrie vectorielle dans l\'espace. Vous apprendrez à visualiser et à résoudre des problèmes spatiaux, une compétence cruciale pour de nombreux domaines scientifiques et d\'ingénierie.'
        ],
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
