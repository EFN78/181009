<!-- login.php -->

<?php
session_start(); // Démarre la session

// À remplacer avec tes informations de base de données
$servername = "localhost";
$username = "paul";
$password = "123456";
$dbname = "nom_de_ta_base_de_donnees";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Requête SQL pour vérifier les identifiants
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username; // Définit la session avec le nom d'utilisateur
    header("Location: home.php"); // Redirige vers la page d'accueil si la connexion réussit
} else {
    echo "Identifiants invalides";
}

// Fermeture de la connexion
$conn->close();
?>
