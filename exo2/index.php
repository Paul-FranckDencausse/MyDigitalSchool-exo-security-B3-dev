<?php
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    echo "Résultats de la recherche pour : " . $searchTerm;
} else {
    echo "Utiliser l'url pour afficher quelque chose";
}
?>
