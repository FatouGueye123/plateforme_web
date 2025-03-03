<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter un Client</h1>
    <form action="traitement_ajout_client.php" method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required class="form-control">
        
        <label>Email :</label>
        <input type="email" name="email" required class="form-control">
        
        <label>Téléphone :</label>
        <input type="text" name="telephone" class="form-control">
        
        <label>Adresse :</label>
        <textarea name="adresse" class="form-control"></textarea>
        
        <br>
        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
</body>
</html>
