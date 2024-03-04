<?php 
    include '../Config/database.php';
    global $message ;
    // Création du CRUD

    // méthode pour supprimer un utilisateur
    if(isset($_GET['method']) && $_GET['method'] == 'delete'){
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM user WHERE id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $message = "<div class='alert alert-success text center'>L'utilisateur a été supprimé </div>";
        }
    }

    //méthode pour lister les utilisateurs
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style type="text/css">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#d4e3e5;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#ffffff;}
</style>
<h1>Users</h1>
<?= $message ?>
<table class="tftable" border="1">
<tr><th>Id</th><th>Pseudo</th><th>Email</th><th>Né(e) le </th><th>Membre depuis le </th><th>Détails</th><th>Modifier</th><th>Supprimer</th></tr>

<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
<tr><td><?= $row['id'] ?></td><td><?= $row['pseudo'] ?></td><td><?= $row['email'] ?></td><td><?= $row['birth_date'] ?></td><td><?= $row['created_at'] ?></td>
    <td><a href="">Voir plus</a> </td>
    <td><a href="">Modifier</a></td>
    <td><a href="index.php?method=delete&id=<?=$row['id'] ?>">Supprimer</a> </td>
</tr>
<?php } ?>
</table>


</body>
</html>