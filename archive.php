<?php get_header();?>

<main class="interior">
	<article class="content">
		<div class="blog-intro"><?php the_field('blog_post_paragraph', 29); ?></div>
		<article class="post-snippet">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="excerpt bg-color-<?php echo rand(1, 6) ?>">
				<h2 class="blog-title color-<?php echo rand(1, 6) ?>	"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<?php if (!empty(get_the_post_thumbnail())): ?>
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
						<?php my_excerpt(20); ?>
					</a>
				</div>
				<div class="engage-bar" data-id="<?php $id = get_the_ID(); echo $id; ?>" data-link="<?php the_permalink(); ?>"  data-count="<?php the_field('likecount'); ?>">
					<div class="the-like-button">
						<i class="fas fa-heart"></i>
						<span class="the-like-counter"><?php the_field('likecount'); ?></span>
					</div>
					<div class="the-fire">🔥</div>
					<div class="the-share-button" data-link="<?php the_permalink(); ?>"><i class="fas fa-share-square"></i></div>
				</div>
			</div>
		<?php endwhile; endif;?>
		</article>
		<div class="pagi">
			<?php happenstance_content_nav(''); ?>
		</div>
	</article>
	<?php get_sidebar();?>
</main>
<?php wp_reset_postdata(); ?>
<?php get_footer();?>