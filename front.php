<?php
	// Template Name: Home
?>

<?php get_header();?>


<div class="welcome">
	<div class="overlay"></div>
	<div class="home-video"></div>
	<div class="welcome-cta">
		<h1>DJ's EDM House Music &amp; Dance Events</h1>
		<span>in San Diego and Around The World</span>
		<ul>
			<li class="get-events">
				<a href="events.sandiegohousemusic.com" class="home-button button">Explore Events</a>
			</li>
		</ul>
	</div>
</div>

<main class="interior" id="#skiptomaincontent">



	<div class="content" >



		<h2 class="color-2"><i class="fas fa-compact-disc"></i> Listen to House Music</h2>
		<article class="set-of-posts">
			<?php 
			$args = array(
				'posts_per_page' => 9,
				'cat' => 22,
				'post_status'=>"publish",
				'post_type'=>"post",
				// 'orderby'=>"rand", 
				// 'year' => "2020, 2019"
			);
			$query1 = new WP_Query( $args );
			?>
			<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
				<div class="excerpt bg-color-<?php echo rand(1,6) ?>">
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
							<?php the_post_thumbnail('', array('class' => 'b-lazy')); ?>
						</a>
					</div>
					<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="meta-data">
							<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
							<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
							<!-- <i class="fas fa-home"></i>  <?php the_author(); ?> -->
						</div>
					<?php endif; ?>

					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
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

		<a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
		<a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>

		<br clear="all">
		<br clear="all">
		<br clear="all">


		<h2 class="color-1"><i class="fal fa-ticket-alt"></i> Upcoming EDM Events: House Music Techno Dance</h2>

		<div class="front-page-events">
			<iframe class="b-lazy" data-src="https://events.sandiegohousemusic.com" frameborder="0" width="100%" height="1320" style="overflow: hidden;" scrolling="no"></iframe>
		</div>
		
		<div class="get-events">
			<a href="events.sandiegohousemusic.com" rel="nofollow" class=" button">More Events</a>
		</div>

		<br clear="all">
		<br clear="all">
		<br clear="all">

		<!-- <article class="set-of-posts">
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
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php the_post_thumbnail(''); ?>
							</a>
						</div>
					<?php endif; ?>
					<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<div class="meta-data">
						<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
						<i class="fas fa-home"></i>  <?php the_author(); ?>
					</div>
					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
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
		 -->

		<br clear="all">
		<br clear="all">
		<br clear="all">

		<section>
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- SDHM Mobile -->
			<ins class="adsbygoogle"
			style="display:block"
			data-ad-client="ca-pub-6261738507723190"
			data-ad-slot="2039607348"
			data-ad-format="auto"
			data-full-width-responsive="true"></ins>
			<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</section>

	<!-- 	<br clear="all">
		<br clear="all">
		<br clear="all">

		<h2 class="color-1"><i class="fal fa-ticket-alt"></i> Weekly House Music Events</h2>
		<div class="front-page-events"></div>

		<article class="set-of-posts">
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
					<div class="thumb">
						<?php if(!empty(get_the_post_thumbnail())): ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
							<?php the_post_thumbnail(''); ?>
						</a>
						<?php endif; ?>
					</div>
						<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
						<div class="meta-data">
							<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
						</div>
					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
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
		<a href="<?php bloginfo('url'); ?>/house-music-events-in-san-diego/" rel="nofollow" class="button">Submit Event</a> -->


		<br clear="all">
		<br clear="all">
		<br clear="all">
		

	</div>


	<div class="content" id="Listen">

		<h2 class="color-2"><i class="fas fa-compact-disc"></i> DJ Mixes from the Archives</h2>
		
		<article class="set-of-posts owl-rotator owl-carousel">
			<?php 
			
			$args = array(
				'posts_per_page' => 10,
				'cat' => 22,
				'post_status'=>"publish",
				'post_type'=>"post",
				'orderby'=>"rand", 
				'year' => "2019"
			);

			$query1 = new WP_Query( $args ); ?>

			<?php if ( $query1 -> have_posts() ) : while ( $query1 -> have_posts() ) : $query1 -> the_post();?>
				<div class="excerpt-rotator bg-color-<?php echo rand(1,6) ?>">
					
					<?php if(!empty(get_the_post_thumbnail())): ?>
						<div class="thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
								<?php the_post_thumbnail('', array('class' => 'b-lazy')); ?>
							</a>
						</div>
					<?php endif; ?>
					<h3 class="blog-title color-<?php echo rand(1,6) ?>"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<div class="meta-data">
						<i class="fas fa-clock"></i>  <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?> 
						<i class="fas fa-headphones"></i>  <?php the_category(', '); ?>
						<!-- <i class="fas fa-home"></i>  <?php the_author(); ?> -->
					</div>
					<div class="para">
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
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


		<a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
		<a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>
	</div>
</main>



<?php get_footer();?>
