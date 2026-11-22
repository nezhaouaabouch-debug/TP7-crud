<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM etudiants WHERE id_etudiant = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;
?>