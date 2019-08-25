<?php get_header();?>

<main class="interior">
	<article class="content">
		<div class="blog-intro"><?php the_field('blog_post_paragraph',29); ?></div>
		<article class="post-snippet">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<div class="excerpt bg-color-<?php echo rand(1,6) ?>">
				<h2 class="blog-title color-<?php echo rand(1,6) ?>	"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<?php if(!empty(get_the_post_thumbnail())): ?>
				<div class="meta-data">
					<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
					<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
					<i class="fas fa-home"></i>  <?php the_author(); ?>
				</div>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(''); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="para">
					<a href="<?php the_permalink(); ?>">
						<?php my_excerpt(40); ?>
					</a>
				</div>
			</div>
		<?php endwhile; endif;?>
		</article>
		<div class="next-prev">
			<?php posts_nav_link( ' ', '<i class="fas fa-compact-disc"></i> &nbsp; Prev page', ' Next page &nbsp; <i class="fas fa-compact-disc">' ); ?>
		</div>
		<div class="pagi">
			<?php happenstance_content_nav( '' ); ?>
		</div>
	</article>
	<?php get_sidebar();?>
</main>
<?wp_reset_postdata(); ?>
<?php get_footer();?>