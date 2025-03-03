<?php
include 'config.php'; // Connexion à la base de données

// Récupérer tous les employés
$requete_employes = $pdo->query("SELECT * FROM employes");
$employes = $requete_employes->fetchAll(PDO::FETCH_ASSOC);

// Récupérer tous les clients
$requete_clients = $pdo->query("SELECT * FROM clients");
$clients = $requete_clients->fetchAll(PDO::FETCH_ASSOC);

// Récupérer tous les documents
$requete_documents = $pdo->query("SELECT * FROM documents");
$documents = $requete_documents->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Employés, Clients et Documents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <!-- Section Employés -->
    <h1>Liste des Employés</h1>
    <a href="ajouter_employe.php" class="btn btn-primary">Ajouter un employé</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Poste</th>
            <th>Date Embauche</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($employes as $emp): ?>
        <tr>
            <td><?= $emp['id'] ?></td>
            <td><?= $emp['nom'] ?></td>
            <td><?= $emp['email'] ?></td>
            <td><?= $emp['poste'] ?></td>
            <td><?= $emp['date_embauche'] ?></td>
            <td>
                <a href="modifier_employe.php?id=<?= $emp['id'] ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimer_employe.php?id=<?= $emp['id'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer cet employé ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Section Clients -->
    <h1>Liste des Clients</h1>
    <a href="ajouter_client.php" class="btn btn-primary">Ajouter un client</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $client['id'] ?></td>
            <td><?= $client['nom'] ?></td>
            <td><?= $client['email'] ?></td>
            <td><?= $client['telephone'] ?></td>
            <td><?= $client['adresse'] ?></td>
            <td>
                <a href="modifier_client.php?id=<?= $client['id'] ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimer_client.php?id=<?= $client['id'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer ce client ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Section Documents -->
    <h1>Liste des Documents</h1>
    <a href="ajouter_document.php" class="btn btn-primary">Ajouter un document</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Fichier</th>
            <th>Date de Téléchargement</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($documents as $document): ?>
        <tr>
            <td><?= $document['id'] ?></td>
            <td><?= $document['titre'] ?></td>
            <td><?= $document['fichier'] ?></td>
            <td><?= $document['date_upload'] ?></td>
            <td>
                <a href="modifier_document.php?id=<?= $document['id'] ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimer_document.php?id=<?= $document['id'] ?>" class="btn btn-danger" onclick="return confirm('Supprimer ce document ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


