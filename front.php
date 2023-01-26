<?php
    // Template Name: Home
?>

<?php get_header();?>
  
<div class="welcome">
    <div class="overlay"></div>
    <div class="home-video"></div>
    <div class="welcome-cta">
        <h1>Dance & House Music DJ Mixes</h1>
        <span>Discover dance music in a city near you and around the world</span>
        <ul>
            <li class="">
                <a href="#music" class="home-button button">Listen Now</a>
            </li>
            <!-- <li class="">
                <a href="#events" class="home-button button">Browse Events</a>
            </li> -->
        </ul>
    </div>
</div>

<main class="interior" id="#skiptomaincontent">
    <div class="content">
        <h2 class="color-2" id="music"><i class="fas fa-compact-disc"></i> Listen to DJ Mixes, House Music and much more</h2>

        <article class="set-of-posts">
            <?php
                $args = array(
                    'posts_per_page' => 12,
                    'cat' => 22,
                    'post_status'=>"publish",
                    'post_type'=>"post",
                );
                $query1 = new WP_Query($args);
            ?>
            <?php if ($query1 -> have_posts()) : while ($query1 -> have_posts()) : $query1 -> the_post();?>
            <div class="excerpt bg-color-<?php echo rand(1, 6) ?>">
                <div class="thumb">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <?php the_post_thumbnail('', array('class' => 'b-lazy')); ?>
                    </a>
                </div>
                
                <h3 class="blog-title color-<?php echo rand(1, 6) ?>"><a href="<?php the_permalink();?>"
                        title="<?php the_title();?>"><?php the_title();?></a></h3>
                <?php if (!empty(get_the_post_thumbnail())): ?>
                <div class="meta-data">
                    <i class="fas fa-clock"></i> <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?>
                    <i class="fas fa-headphones"></i> <?php the_category(', '); ?>
                </div>
                <?php endif; ?>
                
                <div class="para">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
                        <?php my_excerpt(20); ?>
                    </a>
                </div>

                <div class="engage-bar" data-id="<?php $id = get_the_ID(); echo $id; ?>"
                    data-link="<?php the_permalink(); ?>" data-count="<?php the_field('likecount'); ?>">
                    <div class="the-like-button">
                        <i class="fas fa-heart"></i>
                        <span class="the-like-counter"><?php the_field('likecount'); ?></span>
                    </div>
                    <div class="the-fire">🔥</div>
                    <div class="the-share-button" data-link="<?php the_permalink(); ?>"><i
                            class="fas fa-share-square"></i></div>
                </div>
                
            </div>
            <?php endwhile; endif;?>
        </article>

        <a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
        <a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit DJ Mix</a>

        <br clear="all">
        <br clear="all">
        <br clear="all">

   <!--      <section>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6261738507723190"
                data-ad-slot="2039607348" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </section>

    <br />  
    <br />  -->
    
        <!-- <h2 class="color-1" id="events"><i class="fal fa-ticket-alt"></i> Upcoming Events, Festivals, EDM Shows</h2> -->
    </div>
</main>

<!-- <div class="front-page-events">
    <iframe class="b-lazy" data-src="https://sandiegohousemusic.com/events/sdhm-homepage.html" frameborder="0" width="100%"
        height="1320" style="overflow: hidden;" scrolling="no"></iframe>
</div>
    <br clear="all"> -->

<!-- <div class="get-events"> -->
    <!-- <a href="https://sandiegohousemusic.com/" rel="nofollow" class=" button">More Events</a> -->
<!-- </div> -->

<main class="interior">
    <div class="content">

    <br clear="all">
    <br clear="all">
    <br clear="all">
        
    <div class="content">
    
        <!--   <section>
              <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6261738507723190"
                  data-ad-slot="2039607348" data-ad-format="auto" data-full-width-responsive="true"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
          </section>  -->

        <!-- <br clear="all"> -->
        <br clear="all">

        <h2 class="color-2"><i class="fas fa-compact-disc"></i> DJ Mixes from our Archives</h2>

        <article class="set-of-posts owl-rotator owl-carousel">
            <?php
            
            $args = array(
                'posts_per_page' => 10,
                'cat' => 22,
                'post_status'=>"publish",
                'post_type'=>"post",
                'orderby'=>"rand",
                'year' => "2022, 2021, 2020, 2019, 2018"
            );

            $query1 = new WP_Query($args); ?>

            <?php if ($query1 -> have_posts()) : while ($query1 -> have_posts()) : $query1 -> the_post();?>
            <div class="excerpt-rotator bg-color-<?php echo rand(1, 6) ?>">

                <?php if (!empty(get_the_post_thumbnail())): ?>
                <div class="thumb">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                        <?php the_post_thumbnail('', array('class' => 'b-lazy')); ?>
                    </a>
                </div>
                <?php endif; ?>
                <h3 class="blog-title color-<?php echo rand(1, 6) ?>"><a href="<?php the_permalink();?>"
                        title="<?php the_title();?>"><?php the_title();?></a></h3>
                <div class="meta-data">
                    <i class="fas fa-clock"></i> <?php the_time('M');?> <?php the_time('j');?>, <?php the_time('Y'); ?>
                    <i class="fas fa-headphones"></i> <?php the_category(', '); ?>
                </div>
                <div class="para">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" rel="nofollow">
                        <?php my_excerpt(20); ?>
                    </a>
                </div>
                <div class="engage-bar" data-id="<?php $id = get_the_ID(); echo $id; ?>"
                    data-link="<?php the_permalink(); ?>" data-count="<?php the_field('likecount'); ?>">
                    <div class="the-like-button">
                        <i class="fas fa-heart"></i>
                        <span class="the-like-counter"><?php the_field('likecount'); ?></span>
                    </div>
                    <div class="the-fire">🔥</div>
                    <div class="the-share-button" data-link="<?php the_permalink(); ?>"><i
                            class="fas fa-share-square"></i></div>
                </div>
            </div>
            <?php endwhile; endif;?>
        </article>

        <div class="" style="padding-left: 20px">
            <a href="<?php bloginfo('url'); ?>/category/music/" rel="nofollow" class="button">More Music</a>
            <a href="<?php bloginfo('url'); ?>/submit-your-dj-mix/" rel="nofollow" class="button">Submit Your DJ Mix</a>
        </div>

    </div>

</main>

<?php get_footer();?>
