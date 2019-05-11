<footer>

	<div id="overlay-contact-form">
		<div class="close-form">
			<i class="fal fa-times"></i>
		</div>
		<strong>Speak with a Dance Music Expert</strong><br><br>
		<img src="<?php bloginfo('template_directory'); ?>/images/expert.png" alt="hire club DJ">
		Have questions about your party? Inquire now to talk with us, we'll get back right away with usually same day availability and event an consultation. 
		<?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
	</div>

	<section class="bg-hire bg-hire-<?php echo rand(1,4) ?> will-parallax parallax-footer">
		<div>
			<h2>Hire our DJs for<br> Events, Party & Weddings</h2>	
			<p>DJ services in San Diego and beyond. Playing the best club, edm, underground techno, house, top hits and dance music productions.  
			<a title="San Diego DJ" href="#" rel="nofollow" class="button home-button show-form">Learn More</a></p>
		</div>
	</section>

	<div class="footer-boxes">
		<div class="footer-nav">
			<span>House Music, DJs, Clubs </span>
			<?php wp_nav_menu( array(
				'menu' 		=> 'Footer Navigation',
				'menu_id'	=> 'footer-main-1',
				'footer_class' => 'main-menu',
				)); ?>
		</div>
		<div class="footer-nav">
			<span>Our Network</span>
			<?php wp_nav_menu( array(
				'menu' 		=> 'Network Websites',
				'menu_id'	=> 'footer-main-2',
				'footer_class' => 'main-menu',
				)); ?>
		</div>
	</div>

	<div class="footer-signup">
		<b>Sign Up For VIP Emails</b>
		<form action="https://sandiegohousemusic.com/cgi-bin/dada/mail.cgi" method="post"><input name="list" type="hidden" value="sdhm" /><input id="email" name="email" type="text" value="Email Address" />
		<label for="f_s"> </label>
		<input id="f_s" checked="checked" name="f" type="hidden" value="subscribe" />
		<input class="processing button" type="submit" value="Sign Up" /></form>
	</div>

	<section class="lower-footer">
		<div class="site-logo-footer">
			<a href="<?php bloginfo('url'); ?>">
				<img src="https://sandiegohousemusic.com/wordpress/wp-content/uploads/2015/11/logo1.jpg?fit=300%2C97&ssl=1" alt="San Diego DJs">
			</a>
		</div>
 		<div class="schema">
 			<?php do_action('reviews_markup'); ?>
 		</div>
		<div class="get-social footer-social">
			<a href="https://www.instagram.com/sdhousemusic/" target="_blank" rel="noopener" title="instagram"><i class="fab fa-instagram"></i></a>
			<a href="https://www.facebook.com/San-Diego-House-Music-135772356433768/" target="_blank" rel="noopener" title="facebook"><i class="fab fa-facebook"></i></a>
			<a href="https://twitter.com/sdhousemusic" target="_blank" rel="noopener" title="twitter"><i class="fab fa-twitter"></i></a>
 		</div>
 		
 		<div class="footer-show-form">
			<a class="show-form">
				<img src="<?php bloginfo('template_directory'); ?>/images/expert.png" alt="hire club DJ">HIRE DJ<br> 
				Let's Chat
			</a>
 		</div>

		<div class="copyright">Copyright &copy; <?=date("Y")?> <i class="fas fa-home"></i> <?bloginfo('title');?> California.<br>
		 All rights reserved.  <!-- | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> --> &nbsp; <i class="fas fa-balance-scale"></i> <a href="<?php bloginfo('url'); ?>/terms-of-use/" title="Terms of Use">Terms of Use</a> &nbsp; <i class="fas fa-sitemap"></i> <a href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a>
			 </div>

		<div class="amg-sig"><a href="https://www.asburymediagroup.com/" target="_blank" rel="noopener" title="WordPress Website Design, Development, Management, Hosting">WordPress Website Design, Development, Management, Hosting</a> by <i class="fas fa-code"></i> <a href="https://www.asburymediagroup.com/" target="_blank" rel="nofollow noopener" title="Asbury Media Group">Asbury Media Group</a></div>
	</section>  
</footer>

<?wp_footer();?>


<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:35730/browser-sync/browser-sync-client.js?v=2.18.8'><\/script>".replace("HOST", location.hostname));
//]]></script>

</body>
</html>