<?php
include '../Config/database.php';
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create();

$users = "SELECT id FROM user";
$stmt = $conn->prepare($users);
$stmt->execute();
$user = $stmt->fetchAll();

$articles = "SELECT id FROM article";
$stmt = $conn->prepare($articles);
$stmt->execute();
$article = $stmt->fetchAll();


for ($i = 0; $i < 30; $i++ ) {
    $sql = "INSERT INTO comments (`description`,`created_at`, `updated_at`, `article_id`, `user_id`) 
    VALUES(:description, :created_at, :updated_at, :article_id, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'description' => $faker->paragraph(),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date(),
        'article_id' => $article[array_rand($article)]['id'],
        'user_id' => $user[array_rand($user)]['id'],
    ]);
}
