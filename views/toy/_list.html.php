<h1><?php echo $h1_tag ?></h1>
<?php if( empty( $toys ) ): ?>
	<div>Aucun jouet en ce moment</div>
<?php else: ?>
	<ul>
		<?php foreach( $toys as $toy ): ?>
			<li><?php echo $toy->name ?> ( <?php echo $toy->price ?> € )</li>
		<?php endforeach ?>
	</ul>
<?php endif ?>