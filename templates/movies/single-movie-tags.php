<?php $movie_tags = wp_get_post_terms(get_the_ID(), 'movie_tag');?>

<?php if(count($movie_tags) > 0):?>
	<div class="movie-tags-container">
		<?php echo __('Movie Tags:', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN) ?>
		<ul class="movie-tags-list">
			<?php foreach ($movie_tags as $movie_tag):?>
				<li>
					<a href="<?php echo get_term_link($movie_tag);?>">
						<?php echo $movie_tag->name;?>
					</a>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
<?php endif;?>