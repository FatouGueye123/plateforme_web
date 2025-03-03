<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    $requete = $pdo->prepare("UPDATE clients SET nom=?, email=?, telephone=?, adresse=? WHERE id=?");
    $requete->execute([$nom, $email, $telephone, $adresse, $id]);

    header("Location: index.php");
    exit;
}
?>
