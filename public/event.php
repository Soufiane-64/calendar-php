<?php
require '../src/bootstrap.php';

$pdo = get_pdo();
$events = new Calendar\Events($pdo);
if(!isset($_GET['id'])){
    header('location: /404.php');
}
try {
    $event = $events->find($_GET['id']);
}catch (\Exception $e){
    err();
}

require '../views/header.php';
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




