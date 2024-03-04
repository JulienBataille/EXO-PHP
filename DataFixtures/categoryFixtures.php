<?php

include '../Config/database.php';
include '../vendor/autoload.php';

$users = 'SELECT id FROM user';
$stmt = $conn->prepare($users);
$stmt->execute();
$user = $stmt->fetchAll();

$category = [
    1 => [
        'slug' => 'cinéma',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["cinéma.jpg"]',
        'title' => 'cinéma',
        'seoTitle' => 'Tous les articles sur le cinéma',
        'seoDescription' => 'déscription de la catégorie cinéma'
    ],
    2 => [
        'slug' => 'séries',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["séries.jpg"]',
        'title' => 'séries',
        'seoTitle' => 'Tous les articles sur les séries',
        'seoDescription' => 'déscription de la catégorie séries'
    ],
    3 => [
        'slug' => 'gaming',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["gaming.jpg"]',
        'title' => 'gaming',
        'seoTitle' => 'Tous les articles sur le gaming',
        'seoDescription' => 'déscription de la catégorie gaming'
    ],
    4 => [
        'slug' => 'musique',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["musique.jpg"]',
        'title' => 'musique',
        'seoTitle' => 'Tous les articles sur la musique',
        'seoDescription' => 'déscription de la catégorie musique'
    ],
    5 => [
        'slug' => 'livre',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["livre.jpg"]',
        'title' => 'livre',
        'seoTitle' => 'Tous les articles sur le livre',
        'seoDescription' => 'déscription de la catégorie livre'
    ],
    6 => [
        'slug' => 'évènements',
        'CreatedAt' => '2021-01-01 00:00:00',
        'UpdatedAt' => '2021-01-01 00:00:00',
        'slider' => '["évènements.jpg"]',
        'title' => 'évènements',
        'seoTitle' => 'Tous les articles sur l\'évènements',
        'seoDescription' => 'déscription de la catégorie évènements'
    ]

];

foreach ($category as $key => $value){
    $sql = "INSERT INTO categories (`slug`, `created_at`, `updated_at`, `slider`, `title`,`sio_title`,`meta_description`,`user_id`) 
    VALUES (:slug,:created_at,:updated_at,:slider, :title,:sio_title,:meta_description, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'slug' => $value['slug'],
        'created_at' => $value['CreatedAt'],
        'updated_at' => $value['UpdatedAt'],
        'slider' => $value['slider'],
        'title' => $value['title'],
        'sio_title' => $value['seoTitle'],
        'meta_description' => $value['seoDescription'],
        'user_id' => $user[0]['id'],

    ]);


}

