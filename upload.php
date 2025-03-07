<?php
// Activer l'affichage des erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Paramètres de connexion FTP
$ftp_server = "192.168.1.19";  // Remplace avec l'IP de ton serveur Ubuntu
$ftp_user = "ftpuser";  
$ftp_pass = "passer";  

// Connexion au serveur FTP
$ftp_conn = ftp_connect($ftp_server) or die("❌ Impossible de se connecter à $ftp_server");
$login = ftp_login($ftp_conn, $ftp_user, $ftp_pass);

if (!$login) {
    die("❌ Erreur d'authentification FTP.");
}

// Vérifier si un fichier a été téléchargé
if (isset($_FILES["fileToUpload"])) {
    $file_tmp = $_FILES["fileToUpload"]["tmp_name"];
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_path = "/uploads/" . $file_name;  // Le chemin sur le serveur FTP

    // Envoyer le fichier sur le serveur FTP
    if (ftp_put($ftp_conn, $file_path, $file_tmp, FTP_BINARY)) {
        echo "✅ Fichier uploadé avec succès !";
    } else {
        echo "❌ Échec de l'upload.";
    }
} else {
    echo "❌ Aucun fichier détecté.";
}

// Fermer la connexion FTP
ftp_close($ftp_conn);
?>

<!-- Formulaire d'upload de fichier -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de fichier</title>
</head>
<body>
    <h1>Formulaire d'upload de fichier</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Choisir un fichier à envoyer :</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit" name="submit">Envoyer le fichier</button>
    </form>
</body>
</html>

