<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM formations WHERE id_formation = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;
?>