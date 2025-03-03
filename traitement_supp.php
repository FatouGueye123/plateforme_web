<?php
include "config.php"; // Connexion à la base de données

// Vérifier si un ID est bien envoyé
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Préparer la requête SQL
    $sql = "DELETE FROM employes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirection après suppression
        exit();
    } else {
        echo "Erreur lors de la suppression : " . $conn->error;
    }
}

$conn->close();
?>
