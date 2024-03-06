<?php
include '../Config/database.php';
include '../vendor/autoload.php';

$users = 'SELECT id FROM user';
$stmt = $conn->prepare($users);
$stmt->execute();
$user = $stmt->fetchAll();

$categories = 'SELECT id FROM categories';
$stmt = $conn->prepare($categories);
$stmt->execute();
$categorie = $stmt->fetchAll();

$faker = Faker\Factory::create();

// insert ten users into the database
for ($i = 0; $i < 95; $i++ ) {
    $sql = "INSERT INTO article (`title`, `categories_id`, `user_id`, `slug`,`created_at`,`updated_at`, `description`, `youtube`, `cover`, `our_review`, `distribution`) 
    VALUES(:title, :categories_id, :user_id, :slug, :created_at, :updated_at, :description, :youtube, :cover, :our_review, :distribution )";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'title' => $faker->sentence(),
        'categories_id' => $categorie[0]['id'],
        'user_id' => $user[0]['id'],
        'slug' => $faker->url(),
        'updated_at' => $faker->date(),
        'created_at' => $faker->date(),
        'description' => $faker->paragraph(),
        'youtube' => $faker->url(),
        'cover' => $faker->image(null, 640, 480),
        'our_review' => $faker->paragraph(),
        'distribution' => json_encode($faker->paragraph())

    ]);
}

