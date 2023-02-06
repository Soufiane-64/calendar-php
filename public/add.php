<?php
require '../src/bootstrap.php';
render('header',['title' => 'Termin hinzufügen']);
?>



<div class="form-container">
    <h1>Termin hinzufügen</h1>
    <form>
        <input type="text" placeholder="Titel des Termins" required />
        <label for="date">Datum : </label>
        <input type="date" placeholder="Date" required />
        <label for="start" >Startzeit : </label>
        <input type="time"  required />
        <label for="end" >Endzeit : </label>
        <input type="time"  required />
        <textarea placeholder="Terminbeschreibung" required></textarea>
        <button type="submit">Termin hinzufügen</button>
    </form>
</div>


<?php render('footer');?>
