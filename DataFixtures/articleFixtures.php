<?php
include '../Config/database.php';
require_once '../vendor/autoload.php';

$faker = Faker\Factory::create();

// insert ten users into the database
for ($i = 0; $i < 10; $i++ ) {
    $sql = "INSERT INTO article (`title`, `categories_id`, `user_id`, `slug`,`created_at`,`updated_at`, `description`, `youtube`, `cover`, `our_review`, `distribution`) 
    VALUES(:title, :categories_id, :user_id, :slug, :created_at, :updated_at, :description, :youtube, :cover, :our_review, :distribution )";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'title' => $faker->sentence(),
        'categories_id' => $faker->name(),
        'user_id' => $faker->name(),
        'slug' => $faker->url(),
        'updated_at' => $faker->date(),
        'created_at' => $faker->date(),
        'description' => $faker->paragraph(),
        'youtube' => $faker->url(),
        'cover' => $faker->image(null, 640, 480),
        'our_review' => $faker->paragraph(),
        'distribution' => $faker->paragraph()

    ]);
}

