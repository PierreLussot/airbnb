<h1>liste des Annonces</h1>
<?php foreach($rentals as $rental):?>
<p> titre : <a href="/detail/<?= $rental->id?>"><?= $rental->title?></a></p>

    <p>surface :<?= $rental->surface?></p>
    <p>capacity :<?= $rental->capacity?></p>
    <p>pays :<?= $rental->country?></p>
    <p>ville :<?= $rental->city?></p>
    <p>price :<?= $rental->price?></p>

<?php  endforeach; ?>

