<ul class="social">
  <li><a target="blank" href="http://www.flickr.com/photos/alieisner"><i class="icon-camera-retro"></i></a></li>
  <li><a target="blank" href="https://twitter.com/AliEisner"><i class="icon-twitter-sign"></i></a></li>
  <li><a target="blank" href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i></a></li>
  <?php
    $contact = get_page_by_title('Contact');
  ?>
  <li><a href="<?php echo get_page_link($contact->ID); ?>"><i class="icon-envelope-alt"></i></a></li>
</ul>