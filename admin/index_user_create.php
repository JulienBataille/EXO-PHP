<?php
include '../Config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="pseudo" placeholder="Pseudo"> <br>
        <input type="email" name="email" placeholder="Email"> <br>
        <input type="password" name="password" placeholder="Mot de passe"> <br>
        <input type="date" name="birth_date"> <br>
        <select name="gender">
            <option value="monsieur">Monsieur</option>
            <option value="madame">Madame</option>
        </select> <br>
        <input type="checkbox" name="is_valide"> <br>
        <input type="file" name="avatar"> <br>

        <button type="submit">Créer</button>
    </form>


</body>
</html>