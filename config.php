<?php
// Paramètres de connexion
$host = "localhost";         // Serveur de la base de données
$dbname = "projetrx";    // Nom de la base de données
$username = "root";          // Nom d'utilisateur (par défaut 'root' sous WAMP)
$password = "";              // Mot de passe (par défaut vide sous WAMP)

try {
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuration de l'exception en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // En cas d'erreur de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>

