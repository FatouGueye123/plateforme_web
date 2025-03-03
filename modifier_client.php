<?php
include 'config.php';
$id = $_GET['id'];

$requete = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
$requete->execute([$id]);
$client = $requete->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Modifier Client</h1>
    <form action="traitement_modif_client.php" method="POST">
        <input type="hidden" name="id" value="<?= $client['id'] ?>">
        
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $client['nom'] ?>" required class="form-control">
        
        <label>Email :</label>
        <input type="email" name="email" value="<?= $client['email'] ?>" required class="form-control">
        
        <label>Téléphone :</label>
        <input type="text" name="telephone" value="<?= $client['telephone'] ?>" class="form-control">
        
        <label>Adresse :</label>
        <textarea name="adresse" class="form-control"><?= $client['adresse'] ?></textarea>
        
        <br>
        <input type="submit" value="Modifier" class="btn btn-warning">
    </form>
</body>
</html>
