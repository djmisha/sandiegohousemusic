<?php get_header();?>

<div class="interior">
	<?php if(have_posts()) : while (have_posts()) : the_post();?>
		<article class="content" id="skiptomaincontent">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
		</article>
	<?php endwhile; endif;?>

	<?php //get_sidebar();?>
</div>

<?php get_footer();?>


