<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer l'employé
    $sql = "DELETE FROM employes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: index.php");
exit();
?>
