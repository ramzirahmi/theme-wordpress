<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
?>
<?php
//include (get_template_directory() . '/includes/breadcrumb.php');
?>
<section class="membre text-center">
	<div class="container">
		<?php the_content(); ?>
		<?php wp_link_pages(array('before' => '<p class="page-link"><span>' . __('Pages:', 'bestplan') . '</span>', 'after' => '</p>')); ?>
		<?php edit_post_link(__('Edit', 'besplan'), '<p>', '</p>'); ?>
		<?php endwhile; endif; ?>

	
	</div>
</section>
<?php get_footer(); ?>