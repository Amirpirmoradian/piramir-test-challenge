<?php
global $movies_list;
?>

<div class="movies-list-container">
    <ul class="movies-list">
		<?php
		while ( $movies_list->have_posts() ) {
			$movies_list->the_post();
			?>
            <li class="movie-item">
                <a href="<?php echo get_permalink( get_the_ID() ) ?>"><?php echo get_the_title() ?></a>
            </li>
			<?php
		}
		?>
    </ul>
</div>
