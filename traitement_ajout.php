<?php
include "config.php";
$nom = $_POST["nom"];
$email = $_POST["email"];

$sql = "INSERT INTO employes (nom, email) VALUES ('$nom', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "Employé ajouté avec succès !";
} else {
    echo "Erreur : " . $conn->error;
}
?>
