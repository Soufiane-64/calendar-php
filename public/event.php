<?php
require_once '../src/bootstrap.php';

$pdo = Connexion::getConnect()->getConnection();
$events = new Calendar\Events($pdo);

try {
    $event = $events->find($_GET['id']);
}catch (\Exception $e){
    err();
}
<<<<<<< HEAD
require '../views/header.php';
=======
render ('header', ['title' => $event->getName()]);
>>>>>>> 466b23e (add ebet interface)
?>

<h1><?= h($event->getName()); ?></h1>

<ul>
    <li>Datum: <?= $event->getStart()->format('d-m-Y'); ?></li>
    <li>Startzeit : <?= $event->getStart()->format('H:i'); ?></li>
    <li>Endzeit : <?= $event->getEnd()->format('H:i'); ?></li>
    <li>
        Beschreibung:<br>
        <?= h($event->getDescription()); ?>
    </li>
</ul>


<?php require '../views/footer.php';?>




