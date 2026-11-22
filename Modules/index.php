
<?php
require_once "../database/connexion.php";

$sql = "SELECT modules.*, formations.nom AS formation
        FROM modules
        INNER JOIN formations
        ON modules.id_formation = formations.id_formation";
$stmt = $pdo->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<HTML>
    <title>Liste des formations</title>
<body style="background:#E3F2FD ; padding:50px; width:1000px; margin:auto; border-radius:15px; box-shadow:0 4px 20px">
<h1 >Liste des modules</h1>
<a href="create.php">Ajouter un module</a> <br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Coefficient</th>
    <th>Formation</th>
    <th>Actions</th>
</tr>

<?php foreach ($modules as $m): ?>
<tr>
    <td><?php echo  $m['id_module'] ?></td>
    <td><?php echo  htmlspecialchars($m['titre']) ?></td>
    <td><?php echo  htmlspecialchars($m['description']) ?></td>
    <td><?php echo  $m['coefficient'] ?></td>
    <td><?php echo  $m['id_formation'] ?></td>
    <td>
        <a href="edit.php?id=<?php echo  $m['id_module'] ?>">Modifier</a>
            |
        <a href="delete.php?id=<?php echo  $m['id_module'] ?>">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</html>
</body>