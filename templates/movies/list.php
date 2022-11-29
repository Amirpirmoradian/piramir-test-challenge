<?php
global $wp_query;
?>

<div class="movies-list-container">
	<ul class="movies-list">
		<?php
		while($wp_query->have_posts()){
		    $wp_query->the_post();
		?>
            <li class="movie-item">
                <a href="<?php get_permalink(get_the_ID())?>"><?php the_title()?></a>
            </li>
        <?php
		}
        ?>
	</ul>
</div>
