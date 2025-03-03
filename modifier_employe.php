<?php
include 'config.php';

// Vérifier si un ID est passé en paramètre
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Récupérer les informations de l'employé
$requete = $pdo->prepare("SELECT * FROM employes WHERE id = ?");
$requete->execute([$id]);
$employe = $requete->fetch(PDO::FETCH_ASSOC);

if (!$employe) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $poste = $_POST['poste'];

    // Mettre à jour l'employé
    $sql = "UPDATE employes SET nom = ?, email = ?, poste = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $poste, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Modifier un Employé</h1>
    <form method="post">
        <div class="mb-3">
            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" value="<?= $employe['nom'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" value="<?= $employe['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Poste :</label>
            <input type="text" name="poste" class="form-control" value="<?= $employe['poste'] ?>">
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
        <a href="index.php" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>
