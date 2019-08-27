<?php
	// Template Name: Home
?>

<?php get_header();?>

<div class="welcome" id="skiptomaincontent">
	<div class="home-video"></div>
<!-- 	<video playsinline autoplay muted loop poster="<?php bloginfo('template_directory'); ?>/images/slide-1.jpg" class="bgvid">
		<source src="<?php bloginfo('template_directory'); ?>/images/video.mp4" type="video/mp4">
	</video> -->
		<div class="welcome-cta">
			<h2>DJ's EDM House Music &amp; Dance Events</h2> 
			<h3>in San Diego and Around The World</h3>
			<a href="#Listen" class="home-button button" rel="nofollow">Listen Now</a>
		</div>
	</div>

	<main class="interior" id="#skiptomaincontent">
		<div class="content" id="Listen">

			<h2 class="color-2"><i class="fas fa-compact-disc"></i> Listen to House Music</h2>
			<article class="post-snippet">
				<?php 
				$args = array(
					'posts_per_page' => 9,
					'cat' => 22,
					'post_status'=>"publish",
					'post_type'=>"post",
					'orderby'=>"post_date"); 
				// wp_query($args);

				// The Query
					$query1 = new WP_Query( $args );

				?>
				<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
					<!-- <div class="excerpt"> -->
						<div class="excerpt bg-color-<?php echo rand(1,6) ?>">
							
							<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
							<?php if(!empty(get_the_post_thumbnail())): ?>
								<div class="meta-data">
									<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
									<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
									<i class="fas fa-home"></i>  <?php the_author(); ?>
								</div>
								<div class="thumb">
									<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
										<?php the_post_thumbnail(''); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="para">
								<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
									<?php my_excerpt(40); ?>
								</a>
							</div>
						</div>
					<?php endwhile; endif;?>
				</article>

				<a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
				<a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>
				
				<br clear="all">
				<br clear="all">
				<br clear="all">

				<h2 class="color-1"><i class="fal fa-ticket-alt"></i> Weekly House Music, Techno &amp; EDM Events</h2>
				<div class="front-page-events"></div>
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
					<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
						<div class="excerpt">
							<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
							<?php if(!empty(get_the_post_thumbnail())): ?>
								<div class="meta-data">
									<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
									<i class="fas fa-home"></i>  <?php the_author(); ?>
								</div>
								<div class="thumb">
									<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
										<?php the_post_thumbnail(''); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="para">
								<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
									<?php my_excerpt(40); ?>
								</a>
							</div>
						</div>
					<?php endwhile; endif;?>
				</article>
				<a href="<?php bloginfo('url'); ?>/category/upcoming-events/" rel="nofollow" class="button">More Events</a>
				<a href="<?php bloginfo('url'); ?>/house-music-events-in-san-diego/" rel="nofollow" class="button">Submit Event</a>

			</div>

		</main>

		<?php get_footer();?>