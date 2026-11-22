<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM modules WHERE id_module = ?"
);
$stmt->execute([$id]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);

$formations = $pdo->query(
    "SELECT * FROM formations"
)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['modifier'])) {

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $coefficient = $_POST['coefficient'];
    $id_formation = $_POST['id_formation'];

    $sql = "UPDATE modules
            SET titre = ?, description = ?,coefficient = ?, id_formation = ?
            WHERE id_module = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $description,$coefficient, $id_formation, $id]);

    header('Location: index.php');
    exit;
}
?>

<h1>Modifier un module</h1>

<form method="POST"  style ="background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom :
    <input type="text" name="titre"
           value="<?= htmlspecialchars($module['titre']) ?>">
     <br><br>
    Description :
    <input type="text" name="description"
           value="<?= htmlspecialchars($module['description']) ?>">
        <br><br>
    coefficient :
    <input type="number" name="coefficient"
           value="<?= htmlspecialchars($module['coefficient']) ?>">
    <br><br>
    Formation :
    <select name="id_formation">
        <?php foreach ($formations as $f): ?>
            <option value="<?= $f['id_formation'] ?>"
                <?= $f['id_formation'] == $module['id_formation']
                    ? 'selected' : '' ?>>
                <?= htmlspecialchars($f['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <button type="submit" name="modifier"  style=" padding:10px; background:#1E3B8B; color:white; border:none; border-radius:8px; font-size:15px;" >Modifier</button>
    </from>