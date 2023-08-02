<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;
use App\Models\Movie; 

$movieRepository = new MovieRepository();

if (isset($_POST['title']) && isset($_POST['date'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];

    
    $movie = new Movie();
    $movie->setTitle($title);
    $movie->setReleaseDate(new DateTime($date));

    $movieRepository->insertMovie($movie);
}

header('Location: index.php');
exit();
?>
