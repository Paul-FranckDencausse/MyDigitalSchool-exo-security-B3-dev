<?php
if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']); // Pour éviter que le client pense que cette entrée est du code on échappe les caractères à l'aide de la fonction native htmlspecialchars
    echo "Résultats de la recherche pour : " . $searchTerm;
} else {
    echo "Utiliser l'url pour afficher quelque chose";
}
?>
