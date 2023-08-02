<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();

if (isset($_POST['title-search'])) {
    $searchTitle = $_POST['title-search'];

    
    $movies = $movieRepository->findByTitle($searchTitle);
}
?>


    <?php if (isset($movies) && count($movies) > 0) : ?>
        <h2>Résultats :</h2>
        <ul>
            <?php foreach ($movies as $movie) : ?>
                <li><?= $movie['title']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun film trouvé pour ce titre.</p>
    <?php endif; ?>

