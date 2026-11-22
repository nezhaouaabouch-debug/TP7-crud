
<?php
require_once "../database/connexion.php";

$sql = "SELECT * FROM formations";
$stmt = $pdo->query($sql);
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<HTML>
    <title>Liste des formations</title>
<body style="background:#E3F2FD ; padding:50px; width:1000px; margin:auto; border-radius:15px; box-shadow:0 4px 20px">
<h1>Liste des formations</h1>
<a href="create.php">Ajouter une formation</a><br>
<a href="edit.php?id=<?php echo $f['id_formation'] ?>">Modifier une formation</a><br><br>
<table border="1">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Duree</th>
    <th>Actions</th>
</tr>

<?php foreach ($formations as $f): ?>
<tr>
    <td><?php echo $f['id_formation'] ?></td>
    <td><?php echo  htmlspecialchars($f['nom']) ?></td>
    <td><?php echo  htmlspecialchars($f['description']) ?></td>
    <td><?php echo  $f['duree'] ?></td>
    <td>
        <a href="edit.php?id=<?php echo  $f['id_formation'] ?>">Modifier</a>
        |
        <a href="delete.php?id=<?php echo  $f['id_formation'] ?>">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</html>
</body>
