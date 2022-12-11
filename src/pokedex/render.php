<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php if ( isset( $attributes['pokemonName'] ) && ! empty( $attributes['pokemonName'] ) ) : ?>
		<div className="pokemon-info"><?php echo $attributes['pokemonName']; ?> is a cool Pokemon!</div>
	<?php else : ?>
		<div>No Pokemon chosen</div>
	<?php endif; ?>
</div>
