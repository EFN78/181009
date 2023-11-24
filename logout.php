<!-- logout.php -->

<?php
session_start(); // Démarre la session

// Détruit la session (déconnexion)
session_destroy();

// Redirige vers la page de connexion
header("Location: login.html");
exit();
?>
 
