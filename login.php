<?php
include 'Config/database.php';

global $message;

if(isset($_POST['mail']) && isset($_POST['pwd'])){
    $sql = "SELECT * FROM user WHERE email = :email AND is_valide = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $_POST['mail']
    ]);

    $user = $stmt->fetch();

    if($user && password_verify($_POST['pwd'], $user['password'])){
       session_start();
       $_SESSION['pseudo'] = $user['pseudo'];
       $_SESSION['email'] = $user['email'];

       header('Location: dashboard.php');

    } else {
        $message = "Identifiants incorrects";
    }

} else {
    $message = "Veuillez remplir tous les champs";
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1><?= $message ?></h1>
    <form action="login.php" method="post">
        <input type="text" name="mail">
        <input type="password" name="pwd">
        <button type="submit">Connexion</button>
    </form>
</body>
</html>