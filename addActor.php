<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\ActorRepository;
use App\Models\Actor;

$actorRepository = new ActorRepository();

if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    
    $actor = new Actor();
    $actor->setFirstName($firstName);
    $actor->setLastName($lastName);

   
    $actorRepository->insertActor($actor);
}

header('Location: index.php');
exit();
?>

