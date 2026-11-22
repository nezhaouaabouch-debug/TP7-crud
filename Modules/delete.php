
<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM modules WHERE id_module = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;
?>