<?php $extra_info = get_post_meta( $post->ID, 'extra_info', true );?>
<?php if($extra_info != ''):?>
	<div class="movie-extra-info">
		<?php echo __('Extra Info:', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN) ?>
		<p>
			<?php echo $extra_info;?>
		</p>
	</div>

<?php endif?>