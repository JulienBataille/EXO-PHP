<?php
include '../Config/database.php';
require_once '../vendor/autoload.php';

$articles = "SELECT id FROM article";
$stmt = $conn->prepare($articles);
$stmt->execute();
$article = $stmt->fetchAll();

$faker = Faker\Factory::create();


// insérer dix commentaire dans la base de données
for ($i = 0; $i < 10; $i++) {
    $sql = "INSERT INTO picture (`name`,`alt`,`position`,`article_id`) 
            VALUES(:name, :alt, :position, :article_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

$data = [
    'name' => $faker->name(),
    'alt' => $faker->name(),
    'position' =>$faker->randomDigit(),
    'article_id' => $article[array_rand($article)]['id']
];