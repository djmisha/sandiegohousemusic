<?php get_header();?>

<section class="interior">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<article class="content">
			<?php if(!empty(get_the_post_thumbnail())): ?>
					<div class="featured-image">
						<?php the_post_thumbnail(''); ?>
					</div>
				<?php endif; ?>

			<h1 class="color-<?php echo rand(1,6) ?>"><?php the_title(); ?></h1>
			<div class="meta-data">
				<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
				<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
				<i class="fas fa-home"></i>  <?php the_author(); ?>
			</div>
			<?php the_content();?>
			<?php edit_post_link( $link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id ); ?>
			<div class="next-prev">
				<?php
				prevnext__modify( get_previous_post_link('%link', '&larr; Prev') ,
					$attributes = array(
						'class' => 'button prev-blog-button',
					));
					?>
					<?php
					prevnext__modify( get_next_post_link('%link', 'Next &rarr;') ,
						$attributes = array(
							'class' => 'button alignright next-blog-button',
						));
					?>
			</div>
		</article>
		<?php endwhile; endif;?>
		<?php get_sidebar();?>
	</section>
<?php get_footer();?>