<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="maximum-scale=5.0, user-scalable=yes, width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title><?php wp_title(""); ?></title>

	<?php if(!is_404()): ?>
		<?php miniCSS::url( 'https://fonts.googleapis.com/css?family=Oswald:300,400,700|Roboto+Condensed:400,700|OpenSans:400' ); ?>
	<?php endif; ?>

	<?php wp_head()?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115514301-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-115514301-1');
	</script>

	
</head>

<?php bodyClass(); ?>


<a href="#skiptomaincontent" style="display:none;">Skip to main content</a>

<header class="site-header <?php echo is_front_page() ? 'front-header' : 'int-header'; ?>" >

	<div class="nav-bar">
		<div class="site-logo">
				<a href="<?php bloginfo('url'); ?>">
					<?php echo is_front_page() ? '<h1>' : ''; ?>
						<img src="https://sandiegohousemusic.com/wordpress/wp-content/uploads/2015/11/logo1.jpg?fit=300%2C97&ssl=1" alt="San Diego DJs">
					<?php echo is_front_page() ? '</h1>' : ''; ?>
				</a>
		</div>
		<div class="menu-trigger"> 	
			<div class="touch-button-icon">
				<div class="hamburger"></div>
				<div class="hamburger"></div>
				<div class="hamburger"></div>
			</div>
		</div>
 		<div class="get-social">
			<a href="https://www.instagram.com/sdhousemusic/" target="_blank" rel="noopener" title="instagram"><i class="fab fa-instagram"></i></a>
			<a href="https://www.facebook.com/San-Diego-House-Music-135772356433768/" target="_blank" rel="noopener" title="facebook"><i class="fab fa-facebook"></i></a>
			<a href="#"  rel="noopener" title="twitter"><i class="fab fa-twitter"></i></a>
			<a class="show-form"><i class="fal fa-comments"></i></a>
 		</div>
	</div>
	<nav>
		<?php wp_nav_menu( array(
			'menu' 		=> 'Main',
			'container_class' => 'menu-wrap menu-is-closed',
			'menu_id'	=> 'menu-main',
			'menu_class' => 'main-menu',
			)); ?>
	</nav> 

</header> 

<div class="social-feed">
	<div class="close-feed"><i class="fa fa-window-close"></i></div>
	<div class="the-feed">
		<iframe src="" width="100%" height="100%" frameborder=0></iframe>
	</div>
</div>


<div class="header-images-new">
	<?php if((is_home() or is_search() or is_category() or is_archive() )): ?>
		<section class="page-title">
			<h1 class="color-<?php echo rand(1,6); ?>"><?php single_cat_title();?></h1>
		</section>
	<?php endif; ?>
	<?php if((is_page_template('page-landing.php'))): ?>
		<section class="page-title">
			<h1 class="color-<?php echo rand(1,6); ?>"><?php the_title();?></h1>
		</section>
	<?php endif; ?>
</div>

<section class="site-crumbs">
	<?php echo __salaciouscrumb(); ?>
</section>

