<?php
include 'config.php'; // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $poste = $_POST['poste'];
    $date_embauche = $_POST['date_embauche']; // ✅ Correction ici

    // Insérer l'employé dans la base de données avec date_embauche
    $sql = "INSERT INTO employes (nom, email, poste, date_embauche) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $poste, $date_embauche]); // ✅ Correction ici

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter un Employé</h1>
    <form method="post">
        <div class="mb-3">
            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Poste :</label>
            <input type="text" name="poste" class="form-control">
        </div>
        <div class="mb-3">
            <label>Date Embauche :</label>
            <input type="date" name="date_embauche" class="form-control"> <!-- ✅ Correction: type date -->
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>

