<?php
include 'Config/database.php';

$sqlcategories = "SELECT * FROM categories";
$categories = $conn->prepare($sqlcategories);
$categories ->execute();
$category = $categories->fetch(PDO::FETCH_ASSOC);

$sqlcinema= "SELECT article.title, article.cover, article.description, article.created_at, article.slug
    FROM article
    INNER JOIN categories 
    ON article.categories_id = categories.id
    WHERE categories.title = 'cinéma'
    ORDER BY article.id DESC
    Limit 6";

    $cinema = $conn->prepare($sqlcinema);
    $cinema->execute();



$sqlseries= "SELECT article.title, article.cover, article.description, article.created_at, article.slug
    FROM article
    INNER JOIN categories 
    ON article.categories_id = categories.id
    WHERE categories.title = 'séries'
    ORDER BY article.id DESC
    Limit 6";

    $series = $conn->prepare($sqlcinema);
    $series->execute();
    $serie = $series->fetch(PDO::FETCH_ASSOC)

?>

<!DOCTYPE html>
<html lang="en">

    <?php include '_partials/head.php'; ?>

<body>

<?php include '_partials/header.php'; ?>
<main>
        <!--Slider-->
        <div class="row" id="banner">
            <div class="col-12 col-md-12">
                <img src="./assets/image/accueil/slide-acceuil.jpg" alt="slider" width="1920" height="305"
                    class="slider mt-3">
                <!--<h1 class="slide text-center">Actuellement</h1>-->
            </div>
        </div>

        <!--Hook of the web site-->
        <div>
            <h1 class="tittle text-uppercase gras text-center py-3 titre mb-1 "><strong>distinguer le remarquable du
                    banal!</strong></h1>
        </div>

        <div class="container-fluid">
            <!--Category 1 title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre"><strong><?= $category['title']?></strong></h2>
                    <!--MOVIE-->
                    <article class="col-4">
                        <img class="img-fluid mt-3 rounded-5" src="./assets/image/covers/2.jpg"
                            alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                    </article>
                    <!--Movie section 1-->
                    <div class="col-8 pt-3">
                        <div class="row">
                        <?php while($row = $cinema->fetch(PDO::FETCH_ASSOC)): ?>
                                <div class="col-6">
                                    <div class="row">
                                        <article class="col-4 col-lg-6 ">
                                            <a href="<?= $row['slug'] ?>">
                                                <img class="img-fluid mt-3 rounded-5" src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                                            </a>
                                        </article>
                                        <article class="col-4 col-lg-6 ">
                                            <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                            <p class="overflow-scroll"> <?= substr($row['description'],0,30) ?></p>
                                            <p>publié le<timer><?= $row['created_at'] ?></timer>
                                        </article>
                                    </div>
                                </div>
                                <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

</main>

<?php include '_partials/footer.php' ?>


</body>
</html>