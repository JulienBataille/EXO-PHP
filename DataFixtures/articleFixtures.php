<?php
include '../Config/database.php';
require_once '../vendor/autoload.php';

$user = "SELECT id FROM user";
$usersStatement = $conn->prepare($user);
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$categorie = "SELECT id FROM categories";
$categoriesStatement = $conn->prepare($categorie);
$categoriesStatement->execute();
$categories = $categoriesStatement->fetchAll();

$faker = Faker\Factory::create();

$distri = [
            
            $faker->url,
            $faker->imageUrl(),
            $faker->word(),
            
        ];

// insérer dix utilisateurs dans la base de données
for ($i = 0; $i < 100; $i++) {
    $sql = "INSERT INTO article (`title`, `categories_id`, `user_id`, `slug`, `created_at`, `updated_at`, `description`, `youtube`, `cover`, `our_review`, `distribution`) 
            VALUES(:title, :categories_id, :user_id, :slug, :created_at, :updated_at, :description, :youtube, :cover, :our_review, :distribution)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'title' => $faker->sentence(),
        'categories_id' => $categories[array_rand($categories)]['id'],
        'user_id' => $users[array_rand($users)]['id'],
        'slug' => $faker->slug,
        'created_at' => $faker->date(),
        'updated_at' => $faker->date(),
        'description' => $faker->paragraph(),
        'youtube' => $faker->url,
        'cover' => $faker->imageUrl(),
        'our_review' => $faker->text(),
        'distribution' => json_encode($distri),
    ]);
}