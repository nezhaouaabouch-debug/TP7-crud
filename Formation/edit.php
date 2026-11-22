<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM formations WHERE id_formation = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$formation = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modifier'])) {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $duree = $_POST['duree'];

    $sql = "UPDATE formations
            SET nom = ?, description = ?, duree = ?
            WHERE id_formation = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description, $duree, $id]);

    header('Location: index.php');
    exit;
}
?>

<h1>Modifier une formation</h1>

<form method="POST"  style =" background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom :
    <input type="text" name="nom"
           value="<?php echo  htmlspecialchars($formation['nom']) ?>">
     <br><br>
    Description :
    <input type="text" name="description"
           value="<?php echo  htmlspecialchars($formation['description']) ?>">
    <br><br>
    Durée :
    <input type="text" name="duree"
           value="<?php echo  htmlspecialchars($formation['duree']) ?>">
     <br><br>
    <button type="submit" name="modifier"  style=" padding:10px; background:#1E3B8B; color:white; border:none; border-radius:8px; font-size:15px;">Modifier</button>
</form>
