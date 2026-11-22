
<?php
require_once "../database/connexion.php";

$sql = "SELECT etudiants.*, formations.nom  AS nom_formation
        FROM etudiants
        JOIN formations
        ON etudiants.id_formation = formations.id_formation";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<HTML>
    <title>Liste des étudiants</title>
<body  style="background:#E3F2FD ; padding:50px; width:1000px; margin:auto; border-radius:15px; box-shadow:0 4px 20px">   
<h1>Liste des étudiants</h1>
<a href="create.php">Ajouter un étudiant</a><br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Formation</th>
    <th>Actions</th>
</tr>

<?php foreach ($etudiants as $e): ?>
<tr>
    <td><?php echo $e['id_etudiant'] ?></td>
    <td><?php echo htmlspecialchars($e['nom']) ?></td>
    <td><?php echo htmlspecialchars($e['prenom']) ?></td>
    <td><?php echo htmlspecialchars($e['email']) ?></td>
    <td><?php echo htmlspecialchars($e['telephone']) ?></td>
    <td><?php echo $e['id_formation'] ?></td>
    <td>
        <a href="edit.php?id=<?php echo  $e['id_etudiant'] ?>">Modifier</a>
        |
        <a href="delete.php?id=<?php echo  $e['id_etudiant'] ?>">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
</HTML>
</body>