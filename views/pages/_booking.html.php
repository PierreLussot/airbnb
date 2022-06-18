<?php foreach($rentals as $rental):?>
    <p> titre : <a href="/detail/<?= $rental->id?>"><?= $rental->title?></a></p>

    <p>surface :<?= $rental->surface?></p>
    <p>capacity :<?= $rental->capacity?></p>
    <p>pays :<?= $rental->country?></p>
    <p>ville :<?= $rental->city?></p>
    <p>price :<?= $rental->price?></p>
    <p>date arriver  :<?= $rental->checking?></p>
    <p>date fin  :<?= $rental->checkoot?></p>


<?php  endforeach; ?>
