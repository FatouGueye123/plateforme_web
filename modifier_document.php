<?php
include 'config.php'; 

// Vérifier si l'ID du document est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations du document
    $requete = $pdo->prepare("SELECT * FROM documents WHERE id = ?");
    $requete->execute([$id]);
    $doc = $requete->fetch(PDO::FETCH_ASSOC);

    // Si le document n'est pas trouvé, afficher une erreur
    if (!$doc) {
        die("Document introuvable!");
    }
} else {
    die("ID de document manquant.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Modifier un Document</h1>
    <form action="traitement_modif_document.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $doc['id'] ?>">

        <div class="mb-3">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control" value="<?= $doc['titre'] ?>" required><br>
        </div>

        <div class="mb-3">
            <label for="fichier">Fichier :</label>
            <input type="file" name="fichier" class="form-control"><br>
            <small>Fichier actuel : <?= $doc['fichier'] ?></small><br>
        </div>

        <button type="submit" class="btn btn-warning">Modifier</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>





