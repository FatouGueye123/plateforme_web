<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];

    // Vérifier si le dossier uploads existe, sinon le créer
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); // Créer le dossier avec les permissions nécessaires
    }

    // Gestion du fichier uploadé
    $nomFichier = basename($_FILES['fichier']['name']);
    $cheminTemp = $_FILES['fichier']['tmp_name'];
    $cheminDestination = "uploads/" . $nomFichier;

    if (move_uploaded_file($cheminTemp, $cheminDestination)) {
        $requete = $pdo->prepare("INSERT INTO documents (titre, fichier) VALUES (?, ?)");
        $requete->execute([$titre, $nomFichier]);

        header("Location: index.php");
    } else {
        echo "❌ Erreur lors de l'upload du fichier.";
    }
}
?>



