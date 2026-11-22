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

    $nom = $_POST['nom_module'];
    $description = $_POST['description'];
    $id_formation = $_POST['id_formation'];

    $sql = "UPDATE modules
            SET titre = ?, description = ?,coefficient = ?, id_formation = ?
            WHERE id_module = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description,$coefficient, $id_formation, $id]);

    header('Location: index.php');
    exit;
}
?>

<h1>Modifier un module</h1>

<form method="POST">
    Nom :
    <input type="text" name="nom_module"
           value="<?= htmlspecialchars($module['nom_module']) ?>">

    Description :
    <input type="text" name="description"
           value="<?= htmlspecialchars($module['description']) ?>">
    coefficient :
    <input type="number" name="coefficient"
           value="<?= htmlspecialchars($module['coefficient']) ?>">
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

    <button type="submit" name="modifier">Modifier</button>
</form>