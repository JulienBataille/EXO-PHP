<?php
    include 'Config/Database.php';

    $categories = ["cinéma", "séries", "gaming", "musique", "livre", "évènements"];

    foreach($categories as $category) {
        $sql = "SELECT article.title, article.cover, article.description, article.created_at  
                FROM article
                INNER JOIN categories  
                    ON article.categories_id = categories.id 
                WHERE categories.title = '$category'
                ORDER BY article.id DESC
                Limit 6
                ";
        // one for each categories
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $$category = $stmt;
    }

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
                    <h2 class="category text-uppercase gras text-center py-2 stitre"><strong>cinéma</strong></h2>
                    <!--MOVIE-->
                    <article class="col-4">
                        <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/cimema-accueil.jpg"
                            alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                    </article>
                    <!--Movie section 1-->
                    <div class="col-8 pt-3">
                        <div class="row">
                            <?php while($row = $cinéma->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container-fluid">
            <!--Category 2 title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre mt-3"><strong>séries</strong></h2>
                    <!--SERIES-->
                    <div class="col-sm-8 pt-3">
                        <div class="row">
                            <!--Serie section 1-->
                            <?php while($row = $séries->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                         </div>
                    </div>     
                <div class="col-4">
                    <div class="row">
                        <article class="col-12">
                            <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/serie-accueil.jpg"
                                alt="image film aquaman" width="490" height="453" style="height: auto; width: auto;">
                        </article>
                    </div>
                </div>
             </section>
        </div>
        <div class="container-fluid">
            <!--Category 3 title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre mt-3"><strong>gaming</strong></h2>
                    <!--GAMING-->
                    <article class="col-4">
                        <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/gaming-accueil.jpg"
                            alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                    </article>
                    <div class="col-8">
                        <div class="row">
                            <!--Gaming section 1-->
                            <?php while($row = $gaming->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container-fluid">
            <!--Category 4 title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre mt-3"><strong>musique</strong></h2>
                    <!--MUSIC-->
               <div class="col-sm-8">
                        <div class="row">
                            <!--Music section 1-->
                            <?php while($row = $musique->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                         </div>
                    </div>     
                <div class="col-4">
                    <div class="row">
                        <article class="col-12">
                            <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/musique-accueil.jpg"
                                alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                        </article>
                    </div>
                </div>
             </section>
        </div>
        <div class="container-fluid">
            <!--Category 5 title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre mt-3"><strong>livre</strong></h2>
                    <!--BOOK-->
                    <article class="col-4">
                        <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/livre-accueil.jpg"
                            alt="image film aquaman" width="192" height="127" style="height: auto; width: auto;">
                    </article>
                    <div class="col-8">
                        <div class="row">
                            <!--Book section 1-->
                            <?php while($row = $livre->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container-fluid">
            <!--Category 6: title-->
            <section class="col-12">
                <div class="row">
                    <h2 class="category text-uppercase gras text-center py-2 stitre mt-3"><strong>évènements</strong></h2>
                    <!--EVENTS-->
                    <div class="col-sm-8">
                        <div class="row">
                            <!--Event section 1-->
                            <?php while($row = $évènements->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-6">
                                <div class="row">
                                    <article class="col-4 col-lg-6 ">
                                        <img class="img-fluid mt-3 rounded-5"
                                            src="./assets/image/covers/<?= $row['cover'] ?>" alt="image film aquaman"
                                            width="192" height="127" style="height: auto; width: auto;">
                                    </article>
                                    <article class="col-4 col-lg-6 ">
                                        <h3 class="align-baseline text-capitalize"><strong><?= $row['title'] ?></strong></h3>
                                        <p class="overflow-scroll">
                                        
                                        <?= substr($row['description'], 0, 30) ?></p>
                                        <p>publié le<timer><?= $row['created_at'] ?></timer>
                                    </article>
                                </div>
                            </div>
                            <?php endwhile; ?>
                         </div>
                    </div> 
                <div class="col-4">
                    <div class="row">
                        <article class="col-12">
                            <img class="img-fluid mt-3 rounded-5" src="./assets/image/accueil/event-accueil.jpg"
                                alt="image catégorie événements" width="490" height="453" style="height: auto; width: auto;">
                        </article>
                    </div>
                </div>
             </section>
                <!--arrow go top page-->
                <div class="limit text-center pb-5">
                    <a href="#"><img src="./assets/image/accueil/fleche-toppage.svg" alt="fleche retour haut de la page accueil" class=""></a>
                </div>
            </section>
        </div>
    </main>
    <?php include '_partials/footer.php'; ?>
</body>
</html>