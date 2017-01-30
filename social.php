<ul class="social">
  <li><a target="blank" href="https://twitter.com/AliEisner"><i class="fa fa-twitter-square"></i></a></li>
  <li><a target="blank" href="http://www.flickr.com/photos/alieisner"><i class="fa fa-flickr"></i></a></li>
  <li><a target="blank" href="http://instagram.com/alieisner"><i class="fa fa-instagram"></i></a></li>
  <li><a target="blank" href="http://feeds.feedburner.com/alieisner"><i class="fa fa-rss"></i></a></li>
  <?php
    $contact = get_page_by_path('contact');
  ?>
  <li><a href="<?php echo get_page_link($contact->ID); ?>"><i class="fa fa-envelope"></i></a></li>
</ul>