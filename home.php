<!-- home.php -->

<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirige vers la page de connexion si non connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Contenu de la page d'accueil...</p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
 
