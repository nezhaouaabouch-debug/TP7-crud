
<?php
require_once '../database/connexion.php';


$id = $_GET['id'];
$sql = "SELECT * FROM etudiants WHERE id_etudiant = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM formations";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['modifier'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $id_formation = $_POST['id_formation'];


    $sql = "UPDATE etudiants
            SET nom = ?, prenom = ?, email = ?,
                telephone = ?, id_formation = ?
            WHERE id_etudiant = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $telephone, $id_formation, $id]);

    header('Location: index.php');
    exit;
}
?>
<h1>Modifier un étudiant</h1>
<form method="POST"  style ="background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom :
    <input type="text" name="nom"
           value="<?= htmlspecialchars($etudiant['nom']) ?>">
    <br><br>
    Prénom :
    <input type="text" name="prenom"
           value="<?= htmlspecialchars($etudiant['prenom']) ?>">
    <br><br>
    Email :
    <input type="email" name="email"
           value="<?= htmlspecialchars($etudiant['email']) ?>">
    <br><br>
    Téléphone :
    <input type="text" name="telephone"
           value="<?= htmlspecialchars($etudiant['telephone']) ?>">
    <br><br>
    Formation :
    <select name="id_formation">
        <?php foreach ($formations as $f): ?>
            <option value="<?= $f['id_formation'] ?>"
                <?= $f['id_formation'] == $etudiant['id_formation']
                    ? 'selected' : '' ?>>
                <?= htmlspecialchars($f['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <button type="submit" name="modifier"  style=" padding:10px; background:#1E3B8B; color:white; border:none; border-radius:8px; font-size:15px;" >Modifier</button>
</form>