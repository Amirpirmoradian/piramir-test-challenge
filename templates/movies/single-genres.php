<?php $genres = wp_get_post_terms(get_the_ID(), 'genre');?>

    <?php if(count($genres) > 0):?>
	<div class="movie-genres-container">
		<?php echo __('Genres:', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN) ?>
		<ul class="genres-list">
			<?php foreach ($genres as $genre):?>
				<li>
					<a href="<?php echo get_term_link($genre)?>">
						<?php echo $genre->name?>
					</a>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
<?php endif;?>