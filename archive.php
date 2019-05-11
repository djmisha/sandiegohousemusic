<?get_header()?>

<main class="interior">
	<article class="content">
		<div class="blog-intro"><?php the_field('blog_post_paragraph',29); ?></div>

		<article class="post-snippet">
		<?if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<div class="excerpt bg-color-<?php echo rand(1,6) ?>">
				<h2 class="blog-title color-<?php echo rand(1,6) ?>	"><a href="<?the_permalink();?>"><?the_title();?></a></h2>
				<?php if(!empty(get_the_post_thumbnail())): ?>
				<div class="meta-data">
					<i class="fas fa-clock"></i>  <?the_time('M');?> <?the_time('j');?>, <? the_time('Y'); ?> 
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
						<?php my_excerpt(20); ?>
					</a>
				</div>
			</div>
		<?endwhile; endif;?>
		</article>

		<div class="next-prev">
			<?php posts_nav_link( ' ', '<i class="fal fa-angle-left"></i> &nbsp; previous page', ' next page &nbsp; <i class="fal fa-angle-right"></i>' ); ?>
		</div>
		<div class="pagi">
			<?php happenstance_content_nav( '' ); ?>
		</div>

	</article>
	<?php get_sidebar()?>
</main>
<?wp_reset_postdata(); ?>
<?get_footer()?>