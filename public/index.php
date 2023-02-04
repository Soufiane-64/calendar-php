<?php
require '../src/bootstrap.php';


$pdo = get_pdo();
$events = new Calendar\Events($pdo);
$month = new Calendar\Month($_GET['month'] ?? null ,$_GET['year'] ?? null);
$start = $month->getStartingDay();
$start = $start->format('N') === '1' ? $start  : $month->getStartingDay()->modify('last sunday');
$weeks = $month->getWeeks();
$end = (clone $start)->modify('+' .(6 + 7 * ($weeks - 1)). ' days') ;
$events = $events->getEventsBetweenByDay($start,$end);
require '../views/header.php';
?>



<header>
    <h1 class="logo" ><?= $month->toString();?></h1>
    <nav>
        <ul class="nav__links">
            <li><a class="prev" href="/public/index.php?month=<?= $month->previousMonth()->month;?>
            &year=<?= $month->previousMonth()->year;?>"><button> &lt; </button></a></li>

            <li><a class="next" href="/public/index.php?month=<?= $month->nextMonth()->month;?>
            &year=<?= $month->nextMonth()->year;?>"><button> &gt; </button></a></li>
        </ul>
    </nav>
</header>

<table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
    <?php for ($i = 0; $i < $weeks; $i++): ?>
        <tr>
            <?php foreach($month->days as $k => $day):
                $date = (clone $start)->modify ("+" . ($k + $i * 7). " days");
                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
                ?>

                <td class="<?= $month->withinMonth($date) ?'' : 'calendar__othermonth' ;?>">
                    <?php if ($i === 0): ?>
                        <div class="calendar__weekday"><?= $day; ?></div>
                    <?php endif; ?>
                    <div class="calendar__day"><?= $date-> format ( 'd'); ?></div>
                    <?php foreach ($eventsForDay as $event): ?>
                        <div class="calendar__event">
                            <?= (new DateTime($event['start']))->format('H:i')?> - <a href="/public/event.php?id=<?= $event['id'];?>"><?= h($event['name']);?></a>
                        </div>
                    <?php endforeach;?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
</table>
<?php require '../views/footer.php';?>




