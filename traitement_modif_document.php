<?php
include 'config.php'; // Connexion à la base de données

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID du document
    $id = $_POST['id'];

    // Récupérer les nouvelles informations
    $titre = $_POST['titre'];
    $fichier = $_FILES['fichier']['name']; // Nom du fichier téléchargé

    // Récupérer le document actuel depuis la base de données pour vérifier l'ancien fichier
    $requete = $pdo->prepare("SELECT * FROM documents WHERE id = ?");
    $requete->execute([$id]);
    $document = $requete->fetch(PDO::FETCH_ASSOC);

    // Si aucun fichier n'est téléchargé, conserver le fichier existant
    if ($fichier == '') {
        $fichier = $document['fichier'];
    } else {
        // Si un fichier est téléchargé, on déplace le fichier vers le dossier 'uploads'
        $cheminTemp = $_FILES['fichier']['tmp_name'];
        $cheminDestination = "uploads/" . basename($fichier);

        // Vérifier si le dossier uploads existe, sinon le créer
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Déplacer le fichier téléchargé dans le dossier 'uploads'
        if (!move_uploaded_file($cheminTemp, $cheminDestination)) {
            die("Erreur lors de l'upload du fichier.");
        }
    }

    // Mettre à jour les informations du document dans la base de données
    $updateQuery = $pdo->prepare("UPDATE documents SET titre = ?, fichier = ? WHERE id = ?");
    $updateQuery->execute([$titre, $fichier, $id]);

    // Rediriger vers la page principale après la mise à jour
    header("Location: index.php");
    exit();
}



