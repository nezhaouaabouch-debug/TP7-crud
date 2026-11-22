<?php
require_once '../database/connexion.php';

$formations = $pdo->query(
    "SELECT * FROM formations"
)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['ajouter'])) {

    $nom = $_POST['nom_module'];
    $description = $_POST['description'];
    $id_formation = $_POST['id_formation'];

    $sql = "INSERT INTO modules
            (nom_module, description, id_formation)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description, $id_formation]);

    header('Location: index.php');
    exit;
}
?>

<h1>Ajouter un module</h1>

<form method="POST"  style ="background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom du module :
    <input type="text" name="nom_module" required>
    <br><br>
    Description :
    <input type="text" name="description">
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
