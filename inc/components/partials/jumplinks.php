
  <div class="flexible-jump-links">
    <section class="jump-links-content">
      <span><?php the_sub_field('content'); ?></span>
    </section>
    <div class="jump-link-list">
      <?php if(have_rows('link_list')): ?>
        <ul>
          <?php while(have_rows('link_list')): the_row(); ?>
            <li>
              <a href="<?php the_sub_field('label'); ?>"><?php the_sub_field('link'); ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
