<?php
include 'config.php';

$id = $_GET['id'];

// Récupérer le fichier
$requete = $pdo->prepare("SELECT fichier FROM documents WHERE id = ?");
$requete->execute([$id]);
$doc = $requete->fetch(PDO::FETCH_ASSOC);

// Supprimer le fichier du dossier
if ($doc && file_exists("uploads/" . $doc['fichier'])) {
    unlink("uploads/" . $doc['fichier']);
}

// Supprimer l'entrée en base
$requete = $pdo->prepare("DELETE FROM documents WHERE id = ?");
$requete->execute([$id]);

header("Location: index.php");
?>


