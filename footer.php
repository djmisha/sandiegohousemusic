<footer>

    <div id="overlay-contact-form">
        <div class="close-form">
            <i class="fal fa-times"></i>
        </div>
        <strong>Questions or Comments? </strong>
          <br>Drop us a note and we'll get back to you shortly.<br> 
        <?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
        <br /><br />
        <strong>DJ's Specializing in electronic dance and house music</strong><br><br>
        <img src="<?php bloginfo('template_directory'); ?>/images/expert.png" alt="hire club DJ">
         Searching for a DJ? We'd love to chat with you about your event! <br> <br> 
         Please send us the date, location, occasion and approximate attendance for the event and we'll get back to you quickly. 
         <br /><br />
    </div>

 <?php if (is_page()) { ?>  

    <section class="bg-hire b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/header-<?php echo rand(1, 9) ?>.jpg">
    <!-- <section class="bg-hire will-parallax parallax-footer b-lazy" data-src="<?php bloginfo('template_directory'); ?>/images/header-<?php echo rand(1, 9) ?>.jpg"> -->
        <div>
            <h2>Hire DJs near you<br> Events, Party or Weddings</h2>
            <p>DJ's & Artists specializing in electronic-dance and house music
                for  your party, wedding, private and corporate events. Inquire about our DJ services.
                <a title="San Diego DJ" href="<?php bloginfo('url'); ?>/djs/" class="button home-button">Learn More</a>
            </p>
        </div>
    </section>


    <div class="footer-boxes">
        <div class="footer-nav">
            <span>Events & DJ Mixes </span>
            <?php wp_nav_menu(array(
                'menu' 		=> 'Footer Navigation',
                'menu_id'	=> 'footer-main-1',
                'footer_class' => 'main-menu',
                )); ?>
        </div>
        <div class="footer-nav">
            <span>Services</span>
            <?php wp_nav_menu(array(
                'menu' 		=> 'Network Websites',
                'menu_id'	=> 'footer-main-2',
                'footer_class' => 'main-menu',
                )); ?>
        </div>
        <!-- <div class="footer-nav">
            <div class="footer-signup">
                <span>Sign Up For Our Newsletter</span>
                <form action="https://sandiegohousemusic.com/cgi-bin/dada/mail.cgi" method="post"><input name="list"
                        type="hidden" value="sdhm" /><input id="email" name="email" type="text"
                        value="email@address.com" />
                    <label for="f_s"> </label>
                    <input id="f_s" checked="checked" name="f" type="hidden" value="subscribe" />
                    <input class="processing button" type="submit" value="Sign Up" /></form>
            </div>
        </div> -->
    </div>
    
    <section class="lower-footer">
        <div class="site-logo-footer">
            <a href="<?php bloginfo('url'); ?>">
                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    data-src="https://sandiegohousemusic.com/wordpress/wp-content/uploads/2015/11/logo1.jpg"
                    class="b-lazy" alt="House Music Events & DJ Mixes">
            </a>
        </div>

        <!-- 
        <div class="get-social footer-social">
            <a rel="noopener" title="instagr
            am"><i data-name="instagram" class="fab fa-instagram"></i></a>
            <a rel="noopener" title="facebook"><i data-name="facebook" class="fab fa-facebook"></i></a>
            <a rel="noopener" title="twitter"><i data-name="twitter" class="fab fa-twitter"></i></a>
            <a class="show-form"><i class="fal fa-comments"></i></a>
        </div> 
        -->

        <div class="get-social footer-social">
            <a href="https://twitch.tv/sdhousemusic/" target="_blank" rel="noopener" title="twitch"><i class="fab fa-twitch"></i></a>
            <a href="https://www.instagram.com/sdhousemusic/" target="_blank" rel="noopener" title="instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/San-Diego-House-Music-135772356433768/" target="_blank" rel="noopener" title="facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/sdhousemusic" target="_blank" rel="noopener" title="twitter"><i class="fab fa-twitter"></i></a>
            <a class="show-form"><i class="fal fa-comments"></i></a>
        </div>

        <div class="schema">
            <?php do_action('reviews_markup'); ?>
        </div>

        <div class="footer-show-form">
          <a class="show-form">
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
            data-src="<?php bloginfo('template_directory'); ?>/images/expert.png" alt="hire club DJ"
            class="b-lazy">Questions?<br>Let's Chat!
          </a>
        </div>
 
        <!-- <?php if (is_page(array(9228,4027))) { ?> -->
        <!-- <?php } ?> -->

        <div class="copyright">Copyright &copy; <?=date("Y")?> <i class="fas fa-home"></i> <?php bloginfo('title');?>
            <br>
            All rights reserved.
            <!-- | <a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a> --> &nbsp; <i
                class="fas fa-balance-scale"></i> <a href="<?php bloginfo('url'); ?>/terms-of-use/"
                title="Terms of Use">Terms of Use</a> &nbsp; <i class="fas fa-sitemap"></i> <a
                href="<?php bloginfo('url'); ?>/sitemap/" title="Sitemap">Sitemap</a>
        </div>

        <div class="amg-sig">
          <a href="https://www.asburymediagroup.com/" target="_blank" rel="noopener"
                title="Web Development">Web Development</a> by 
          <i class="fas fa-code"></i> 
          <a href="https://www.asburymediagroup.com/" target="_blank" rel="nofollow noopener"
                title="Asbury Media Group">Asbury Media Group</a>
        </div>
    </section>

    <!-- <div class="back-to-top"><a href="#the-top"><i class="far fa-angle-up"></i></a></div> -->

  <?php } ?>  

</footer>

<?php // Only Show Ads on Homepage and Single Posts ?>
<?php if (is_single()) { ?>
<section class="auto-google-ads">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6261738507723190" data-ad-slot="2039607348"
        data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</section>
<?php } ?>

<?php wp_footer();?>

    <?php
        // Load Browser Sync only on Local
        $browserSync 			= 'http://sandiegohousemusic.local';
        $browserSyncHdrs 		= @get_headers($browserSync);
        if ($browserSyncHdrs):
    ?>

    <script id="__bs_script__">
    //<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace(
        "HOST", location.hostname));
    //]]>
    </script>

    <?php endif; ?>

</body>
</html>
