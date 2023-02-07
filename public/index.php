<?php
require '../src/bootstrap.php';


$pdo = Connexion::getConnect()->getConnection();
$events = new Calendar\Events($pdo);
$today = new Calendar\Month($_GET['month'] ?? null ,$_GET['year'] ?? null);
$month = new Calendar\Month($_GET['month'] ?? null ,$_GET['year'] ?? null);
$start = $month->getStartingDay();
$start = $start->format('N') === '1' ? $start  : $month->getStartingDay()->modify('last Monday');
<<<<<<< HEAD
$weeks = $month->getWeeks();
=======
$weeks = 6;
>>>>>>> 466b23e (add ebet interface)
$end = (clone $start)->modify('+' .(6 + 7 * ($weeks - 1)). ' days') ;
$events = $events->getEventsBetweenByDay($start,$end);

$t_day = date('d');
$t_year = date('Y');
$t_month = date('m');

require '../views/header.php';

<<<<<<< HEAD

?>


=======
?>

<div class="calendar">
>>>>>>> 466b23e (add ebet interface)

<header>
    <h1 class="logo" ><?= $month->toString();?></h1>
    <nav>
        <ul class="nav__links">

            <li><a class="prev" href="./index.php?month=<?= $today->today()->month;?>
            &year=<?= $today->today()->year;?>"><button> Heute </button></a></li>

            <li><a class="prev" href="./index.php?month=<?= $month->previousMonth()->month;?>
            &year=<?= $month->previousMonth()->year;?>"><button> &lt; </button></a></li>

            <li><a class="next" href="./index.php?month=<?= $month->nextMonth()->month;?>
            &year=<?= $month->nextMonth()->year;?>"><button> &gt; </button></a></li>
        </ul>
    </nav>
</header>

<table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
<<<<<<< HEAD
    <?php for ($i = 0; $i < $weeks; $i++): ?>
=======
    <?php for ($i = 0; $i < $weeks; $i++): ;?>

>>>>>>> 466b23e (add ebet interface)
        <tr>
            <?php foreach($month->days as  $k=> $day):

                $date = (clone $start)->modify ("+" . ($k + $i * 7). " days");
                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
                ?>

<<<<<<< HEAD
                <td class="<?= $month->withinMonth($date) ? (($month->month == intval($t_month) && $month->year == intval($t_year) && intval($date-> format ( 'd'))== intval($t_day) )? 'calendar_highlight':'calendar_basic' ): 'calendar__othermonth' ;?>">
=======
                <td class="<?= $month->withinMonth($date) ? (($month->month == intval($t_month)
                    && $month->year == intval($t_year) && intval($date-> format ( 'd'))== intval($t_day) )?
                    'calendar_highlight':'calendar_basic' ): 'calendar__othermonth' ;?>">
>>>>>>> 466b23e (add ebet interface)
                    <?php if ($i === 0): ?>

                        <div class="calendar__weekday"><?= $day; ?></div>
                    <?php endif; ?>
                    <div class="calendar__day"><?= $date-> format ( 'd'); ?></div>
                    <?php foreach ($eventsForDay as $event): ?>
                        <div class="calendar__event">
<<<<<<< HEAD
                            <?= (new DateTime($event['start']))->format('H:i')?> - <a href="./event.php?id=<?= $event['id'];?>"><?= h($event['name']);?></a>
=======
                            <?= (new DateTime($event['start']))->format('H:i')?>
                            - <a href="./event.php?id=<?= $event['id'];?>"><?= h($event['name']);?></a>
>>>>>>> 466b23e (add ebet interface)
                        </div>
                    <?php endforeach;?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
</table>
<<<<<<< HEAD
=======



</div>
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<a href="./add.php" class="calendar__button">+</a>


>>>>>>> 466b23e (add ebet interface)
<?php require '../views/footer.php';?>




