<?php
include '../Config/database.php';
include '../vendor/autoload.php';

$users = "SELECT id FROM user";
$stmt = $conn->prepare($users);
$stmt->execute();
$user = $stmt->fetchAll();

$categories = "SELECT id FROM categories";
$stmt = $conn->prepare($categories);
$stmt->execute();
$category = $stmt->fetchAll();

$faker = Faker\Factory::create();





// insérer dix utilisateurs dans la base de données
for ($i = 0; $i < 100; $i++) {

    $distri = [];
    for($j = 0; $j< rand(1,5); $j++){
        $distri[] = [
            'name' => $faker->name,
            'url' => $faker->slug()
        ];
    }

    $url= 'https://picsum.photos/1200/800';
    $imageName = rand(1, 1000).'.jpg';
    $img = '../assets/image/covers/'. $imageName;
    



    $data = [
        'title' => $faker->sentence(),
        'categories_id' => $category[array_rand($category)]['id'],
        'user_id' => $user[array_rand($user)]['id'],
        'slug' => $faker->slug(),
        'created_at' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
        'description' => $faker->paragraph(),
        'youtube' => $faker->url(),
        'cover' => $imageName,
        'our_review' => $faker->text(),
        'distribution' => json_encode($distri),
    ];


    $sql = "INSERT INTO article (`title`, `categories_id`, `user_id`, `slug`, `created_at`, `updated_at`, `description`, `youtube`, `cover`, `our_review`, `distribution`) 
            VALUES(:title, :categories_id, :user_id, :slug, :created_at, :updated_at, :description, :youtube, :cover, :our_review, :distribution)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    file_put_contents($img, file_get_contents($url));
}

