<?php
require_once '../database/connexion.php';

$formations = $pdo->query(
    "SELECT * FROM formations"
)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['ajouter'])) {

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $coefficient = $_POST['coefficient'];
    $id_formation = $_POST['id_formation'];

    $sql = "INSERT INTO modules
            (titre, description,Coefficient, id_formation)
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $description,$coefficient, $id_formation]);

    header('Location: index.php');
    exit;
}
?>

<h1>Ajouter un module</h1>

<form method="POST"  style ="background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom du module :
    <input type="text" name="titre" required>
    <br><br>
    Description :
    <input type="text" name="description">
    <br><br>
    Coefficient :
    <input type="number" name="coefficient">
    <br><br>
    Formation :
    <select name="id_formation" required>
        <?php foreach ($formations as $f): ?>
            <option value="<?= $f['id_formation'] ?>">
                <?= htmlspecialchars($f['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <button type="submit" name="ajouter"  style=" padding:10px; background:#1E3B8B; color:white; border:none; border-radius:8px; font-size:15px;">Ajouter</button>
</form>
