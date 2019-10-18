<?php
	// Template Name: Home
?>

<?php get_header();?>

<main class="interior" id="#skiptomaincontent">
	<div class="content" id="Listen">

		<br clear="all">
		<br clear="all">
		<br clear="all">

		<h2 class="color-2"><i class="fas fa-compact-disc"></i> Listen to House Music</h2>
		<article class="post-snippet">
			<?php 
			$args = array(
				'posts_per_page' => 9,
				'cat' => 22,
				'post_status'=>"publish",
				'post_type'=>"post",
					// 'orderby'=>"rand", 
				'year' => "2019"
			);
				// wp_query($args);

				// The Query
			$query1 = new WP_Query( $args );

			?>
			<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
					<div class="excerpt bg-color-<?php echo rand(1,6) ?>">

						<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
						<?php if(!empty(get_the_post_thumbnail())): ?>
							<div class="meta-data">
								<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
								<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
								<!-- <i class="fas fa-home"></i>  <?php the_author(); ?> -->
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
									<?php the_post_thumbnail(''); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="engage-bar" data-id="<?php $id = get_the_ID(); echo $id; ?>" data-link="<?php the_permalink(); ?>"  data-count="<?php the_field('likeCount'); ?>2">
							<div class="the-like-button">
								<i class="fas fa-heart"></i>
								<span class="the-like-counter"></span>
							</div>
							<!-- <div class="the-fire">🔥</div> -->
							<div class="the-share-button"><i class="fas fa-share-square"></i></div>
						</div>

						<div class="para">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
								<?php my_excerpt(20); ?>
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
		</div>
	</main>

	<div class="welcome">
		<div class="overlay"></div>
		<div class="home-video"></div>
		<div class="welcome-cta">
			<h2>DJ's EDM House Music &amp; Dance Events</h2> 
			<h3>in San Diego and Around The World</h3>
			<a href="#Listen" class="home-button button" rel="nofollow">Listen Now</a>
		</div>
	</div>

	<main class="interior">
		<div class="content" id="Listen">

		<h2 class="color-1"><i class="fal fa-ticket-alt"></i> Upcoming Techno &amp; EDM Events</h2>
		<div class="front-page-events"></div>
		<article class="post-snippet">
			<?php 
			$args = array(
				'posts_per_page' => 3,
				'cat' => 3,
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
							<?php my_excerpt(20); ?>
						</a>
					</div>
				</div>
			<?php endwhile; endif;?>
		</article>


		<br clear="all">
		<br clear="all">
		<br clear="all">

		<h2 class="color-1"><i class="fal fa-ticket-alt"></i> Weekly House Music Events</h2>
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
							<!-- <i class="fas fa-home"></i>  <?php the_author(); ?> -->
						</div>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php the_post_thumbnail(''); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
							<?php my_excerpt(20); ?>
						</a>
					</div>
				</div>
			<?php endwhile; endif;?>
		</article>
		<a href="<?php bloginfo('url'); ?>/category/upcoming-events/" rel="nofollow" class="button">More Events</a>
		<a href="<?php bloginfo('url'); ?>/house-music-events-in-san-diego/" rel="nofollow" class="button">Submit Event</a>


	<br clear="all">
	<br clear="all">
	<br clear="all">

	<h2 class="color-2"><i class="fas fa-compact-disc"></i> DJ Mixes from the Archives</h2>
	
	<article class="post-snippet owl-rotator owl-carousel">
		<?php 
		
			$args = array(
				'posts_per_page' => 10,
				'cat' => 22,
				'post_status'=>"publish",
				'post_type'=>"post",
				'orderby'=>"rand", 
				'year' => "2019"
			);
			// The Query

			$query1 = new WP_Query( $args ); ?>

		<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
				<div class="excerpt-rotator bg-color-<?php echo rand(1,6) ?>">
					
					<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="meta-data">
							<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
							<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
							<!-- <i class="fas fa-home"></i>  <?php the_author(); ?> -->
						</div>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php the_post_thumbnail(''); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
							<?php my_excerpt(20); ?>
						</a>
					</div>
				</div>
			<?php endwhile; endif;?>
		</article>


		<a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
		<a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>

	</div>

</main>

<?php get_footer();?>