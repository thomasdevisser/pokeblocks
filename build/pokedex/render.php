<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php
	$pokemon = isset( $attributes['pokemon'] ) ? $attributes['pokemon'] : '';
	$sprite = $pokemon['sprites']['front_default'];
	$name = $pokemon['name'];
	$types = $pokemon['types'];
	$height = $pokemon['height'];
	$weight = $pokemon['weight'];

	if ( empty( $pokemon ) ) {
		?>
		<p>No Pokemon selected</p>
		<?php
	} else {
		?>
		<div class="pokemon-info">
			<img src="<?php echo $sprite; ?>"></img>

			<div class="info">
				<h2 class="pokemon-name"><?php echo ucfirst( $name ) ?></h2>
				<div class="types">
					<?php foreach ( $types as $type ) : ?>
						<span class="type"><?php echo $type['type']['name'] ?></span>
					<?php endforeach; ?>
				</div>
				<div class="meta">
					<p><strong>Height:</strong> <?php echo $height; ?></p>
					<p><strong>Weight:</strong> <?php echo $weight; ?></p>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>