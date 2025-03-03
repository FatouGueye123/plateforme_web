<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter un Document</h1>
    <form action="traitement_ajout_document.php" method="POST" enctype="multipart/form-data">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" class="form-control" required><br>

        <label for="fichier">Fichier :</label>
        <input type="file" name="fichier" class="form-control" required><br>

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</body>
</html>

