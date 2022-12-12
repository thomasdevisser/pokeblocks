<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php if ( isset( $attributes['pokemonName'] ) && ! empty( $attributes['pokemonName'] ) ) : ?>
		<div className="pokemon-info"><?php echo $attributes['pokemonName']; ?> is a cool Pokemon!</div>
	<?php else : ?>
		<div>No Pokemon chosen</div>
	<?php endif; ?>
</div>

<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php
	$pokemon = isset( $attributes['pokemon'] ) ? $attributes['pokemon'] : '';
	if ( ! $pokemon ) {
		?>
		<p>No Pokemon selected</p>
		<?php
	} else {
		?>
		<div class="pokemon-info">
			<img src="<?php echo $pokemon['sprites']['front_default']; ?>"></img>
			<div class="info">
				<h2 class="pokemon-name"><?php echo ucfirst( $pokemon['name'] ) ?></h2>
				<div class="types">
					<?php foreach ( $pokemon['types'] as $type ) : ?>
						<span class="type"><?php echo $type['type']['name'] ?></span>
					<?php endforeach; ?>
				</div>
				<p><strong>Height:</strong> <?php echo $pokemon['height']; ?></p>
				<p><strong>Weight:</strong> <?php echo $pokemon['weight']; ?></p>
			</div>
		</div>
		<?php
	}
	?>
</div>