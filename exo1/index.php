<?php

// Paramètres de connexion à la base de données
$servername = "127.0.0.1"; // Adresse du serveur de base de données
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe de la base de données
$dbname = "injectionsql"; // Nom de la base de données

// Connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  // En cas d'échec de la connexion, afficher un message d'erreur et arrêter l'exécution du script
  die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données soumises par le formulaire et échappement des caractères spéciaux
$nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']); // Echappement des caractères spéciaux dans le nom d'utilisateur
$mot_de_passe = $conn->real_escape_string($_POST['mot_de_passe']); // Echappement des caractères spéciaux dans le mot de passe

// Requête SQL sécurisée pour récupérer l'utilisateur correspondant aux identifiants saisis
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur' AND mot_de_passe = '$mot_de_passe'";

// Exécution de la requête
$result = $conn->query($query);

// Vérification des résultats de la requête
if ($result->num_rows > 0) {
  // Si des résultats sont retournés, l'utilisateur est authentifié
  echo "Utilisateur authentifié";
} else {
  // Sinon, les identifiants sont incorrects
  echo "Nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion à la base de données
$conn->close();

?>
