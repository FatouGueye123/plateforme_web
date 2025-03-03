<?php
include "config.php"; // Connexion à la base de données

// Vérifier si l'ID et les nouvelles données sont bien envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];

    // Préparer la requête SQL
    $sql = "UPDATE employes SET nom='$nom', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirection après modification
        exit();
    } else {
        echo "Erreur lors de la modification : " . $conn->error;
    }
}

$conn->close();
?>
