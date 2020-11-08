<?php
// Template Name: Events Page
?>

<?php get_header();?>

<section class="sort">
    <div class="sort-city">
        <span id="drop-trigger">San Diego</span>
        <div id="city-list"></div>
    </div>
    <div class="sort-artists">
        <span id="drop-trigger">Artists</span>
        <div id="artist-list"></div>
    </div>
    <div class="sort-venues">
        <span id="drop-trigger">Venues</span>
        <div id="venue-list"></div>
    </div>
    <div class="sort-date">
        <span id="drop-trigger">Dates</span>
        <div id="date-list"></div>
    </div>
</section>

<section class="search">
    <form action="https://www.google.com/search" id="form-search">
        <label for="input-search">search</label>
        <input
            type="text"
            name="search"
            id="input-search"
            value="Search artist, venue, event..."
        />
        <button id="submit-search">Search</button>
    </form>
</section>

<div class="search-all">
    <div id="clearSearch"><span>&times;</span></div>
    <section id="searchresults"></section>
</div>

<section id="evenfeed"></section>

<!-- Scripts -->
<!-- <script src="vendor/blazy.min.js"></script> -->
<script src="<?php bloginfo('template_directory'); ?>/js/events/config.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/events/feed.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/events/search.js"></script>








<!-- <main>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<article class="content">
		<div class="contact-content">
			<div class="contact-form">
				<h2>Email Us</h2>
				<?php the_content(); ?>
			</div>
			<div class="office-info">
				<h2>Location</h2>

				<?php if (have_rows('locations', 'option')): ?>
					<?php while (have_rows('locations', 'option')): the_row(); ?>

						<div class="the-address">
							<div class="map">
								<div class="gmaps">
									<?php the_sub_field('gmap_iframe', 'option'); ?>
								</div>
							</div>
							<div class="addy-hours">
								<div class="address">
									<strong><?php the_sub_field('name', 'option'); ?></strong><br>	
									<?php the_sub_field('address', 'option'); ?><br>
									<?php the_sub_field('city', 'option'); ?><br>
									<a href="<?php the_sub_field('map_link', 'option'); ?>" target="_blank" class="track-outbound" data-label="Address - Contact Page" rel="noopener">View Directions</a><br><br>
									
									Phone: <a href="<?php the_sub_field('phone_link', 'options'); ?>"  class="track-outbound" data-label="Phone - Contact Page"><?php the_sub_field('phone', 'options'); ?></a><br>
									<!-- Text: <?php the_sub_field('text', 'options'); ?><br> -->
									<!-- Fax: <?php the_sub_field('fax', 'options'); ?> -->
								</div>
								<div class="the-hours">
									<strong>Hours</strong>
									<div class="consult">
										<?php the_sub_field('hours', 'option'); ?>
									</div>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</article>
			<?php edit_post_link($link = __('<< EDIT >>'), $before = "<p>", $after ="</p>", $id); ?>
	<?php endwhile; endif;?>
</main> -->


<?php get_footer();?>