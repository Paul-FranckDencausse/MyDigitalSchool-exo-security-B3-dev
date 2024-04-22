<?php
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$dbname = "injectionsql";

// Connexion à la BD
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données  de l'utilisateur
$nom_utilisateur = $conn->real_escape_string($_POST['nom_utilisateur']); // Pour contrer l'injection il faut échapper les caractères. C'est à dire que le client ne puisse pas les reconnaître comme du code. Juste comme du texte.
$mot_de_passe = $conn->real_escape_string($_POST['mot_de_passe']); // Utilisation de real_escape_string pour échapper les caractères spéciaux

// Requête SQL sécurisée
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
