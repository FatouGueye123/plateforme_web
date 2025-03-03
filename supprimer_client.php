<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $requete = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $requete->execute([$id]);
}

header("Location: index.php");
exit;
?>
