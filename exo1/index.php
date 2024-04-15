<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$dbname = "injectionsql";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données utilisateur
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

// Requête SQL vulnérable à l'injection
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur' AND mot_de_passe = '$mot_de_passe'";

// Exécution de la requête
$result = $conn->query($query);

// Vérification des résultats
if ($result->num_rows > 0) {
  echo "Utilisateur authentifié";
} else {
  echo "Nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion
$conn->close();
?>
