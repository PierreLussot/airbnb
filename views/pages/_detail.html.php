<h1>detail</h1>


    <p> titre : <?= $rental->title?></p>

    <p>surface :<?= $rental->surface?></p>
    <p>capacity :<?= $rental->capacity?></p>
    <p>description :<?= $rental->description?></p>
    <p>pays :<?= $rental->country?></p>
    <p>ville :<?= $rental->city?></p>
    <p>price :<?= $rental->price?></p>

    <p>equipement :</p><?php foreach ($items as $item):?>
<p><?= $item->label?></p>
    <?php endforeach;?>

<?php  if (isset($_SESSION['type'])&& $_SESSION['type'] === STANDARD):   ?>
<form action="/reservation" method="POST">
    <input type="date" name="checking" id="">
    <input type="date" name="checkoot" id="">
    <input type="hidden" name="rental_id" value="<?=$rental->id ?>">
    <input type="submit" name="submitDate">
</form>
<?php  endif   ?>

