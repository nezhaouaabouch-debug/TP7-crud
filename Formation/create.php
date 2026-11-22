
<?php
require_once "../database/connexion.php";

if (isset($_POST['ajouter'])) {

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $duree = $_POST['duree'];

    $sql = "INSERT INTO formations (nom, description, duree)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description, $duree]);

    header("Location: index.php");
    exit;
}
?>

<h1>Ajouter une formation</h1>

<form method="POST"  style ="background:#E3F2FD ; padding:50px; width:500px; margin:auto; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    Nom : 
    <input type="text" name="nom" required><br><br>
    Description : 
    <textarea name="description"></textarea><br><br>
    Durée : 
    <input type="number" name="duree"><br><br>

    <button type="submit" name="ajouter"  style=" padding:10px; background:#1E3B8B; color:white; border:none; border-radius:8px; font-size:15px;">Ajouter</button>
</form>
