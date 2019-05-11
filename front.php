<?
	// Template Name: Home
?>

<?get_header()?>

<div class="welcome parallax-welcome will-parallax" id="skiptomaincontent">
	<div class="main-carousel">
		<div class="slide-1"></div>
		<div class="slide-2"></div>
		<div class="slide-3"></div>
	</div>	
	<div class="welcome-cta">
		<h2>DJ's, House Music, <br>EDM, Clubs</h2>
		<h3>in San Diego and Around The World</h3>
		<a href="#Listen" class="home-button button" rel="nofollow">Listen Now</a>
	</div>
</div>
<main class="interior" id="Listen">
	<div class="content" id="#skiptomaincontent">

		<h1 class="color-1"><i class="fal fa-ticket-alt"></i> Weekly House Music Events</h1>
		<article class="post-snippet">
			<?php 
			$args = array(
				'posts_per_page' => 3,
				'cat' => 346,
				'post_status'=>"publish",
				'post_type'=>"post",
				'orderby'=>"post_date"); 

			$query1 = new WP_Query( $args );
			?>
			<?if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
			<div class="excerpt">
				<h2 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?the_permalink();?>" title="<?the_title();?>"><?the_title();?></a></h2>
				<?php if(!empty(get_the_post_thumbnail())): ?>
					<div class="meta-data">
						<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
						<i class="fas fa-home"></i>  <?php the_author(); ?>
					</div>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" title="<?the_title();?>">
							<?php the_post_thumbnail(''); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="para">
					<a href="<?php the_permalink(); ?>" title="<?the_title();?>" rel="nofollow">
						<?php my_excerpt(25); ?>
					</a>
				</div>
			</div>
			<?endwhile; endif;?>
		</article>
		<a href="<?php bloginfo('url'); ?>/category/upcoming-events/" rel="nofollow" class="button">More Events</a>
		<a href="<?php bloginfo('url'); ?>/house-music-events-in-san-diego/" rel="nofollow" class="button">Submit Event</a>


		<br clear="all">
		<br clear="all">
		<br clear="all">

		<h1 class="color-2"><i class="fas fa-compact-disc"></i> Listen to House Music</h1>
		<article class="post-snippet">
			<?php 
			$args = array(
				'posts_per_page' => 6,
				'cat' => 22,
				'post_status'=>"publish",
				'post_type'=>"post",
				'orderby'=>"post_date"); 
				// wp_query($args);

				// The Query
			$query1 = new WP_Query( $args );
			?>
			<?if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
			<!-- <div class="excerpt"> -->
			<div class="excerpt bg-color-<?php echo rand(1,6) ?>">
				
				<h2 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?the_permalink();?>" title="<?the_title();?>"><?the_title();?></a></h2>
				<?php if(!empty(get_the_post_thumbnail())): ?>
					<div class="meta-data">
						<i class="fas fa-clock"></i>  <?the_time('M');?> <?the_time('j');?>, <? the_time('Y'); ?> 
						<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
						<i class="fas fa-home"></i>  <?php the_author(); ?>
					</div>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" title="<?the_title();?>">
							<?php the_post_thumbnail(''); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="para">
					<a href="<?php the_permalink(); ?>" title="<?the_title();?>" rel="nofollow">
						<?php my_excerpt(25); ?>
					</a>
				</div>
			</div>
			<?endwhile; endif;?>
		</article>
		<a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
		<a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>


	</div>

</main>


<?get_footer()?>