jQuery( document ).ready( function( $ ) {
  var wh = $(window).height();
  var ph = $("#page").height();
  if ( wh > ph ) {
    $(".page-template-landing-php #page").css({ 'padding-top': (wh - ph) / 2});
  }

  // Find all YouTube videos
  var $vimeoVideos = $("iframe[src^='http://player.vimeo.com'], iframe[src^='//player.vimeo.com']"),
    $youTubeVideos = $("iframe[src^='http://www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $(".entry-content--video");

  // Figure out and save aspect ratio for each video
  $vimeoVideos.each(function() {

    $(this)
      .data('aspectRatio', this.height / this.width)

      // and remove the hard coded width/height
      .removeAttr('height')
      .removeAttr('width');

   });

  $youTubeVideos.each(function() {

    $(this)
      .data('aspectRatio', this.height / this.width)

      // and remove the hard coded width/height
      .removeAttr('height')
      .removeAttr('width');

   });

  // When the window is resized

  // console.log($vimeoVideos);
  $(window).resize(function() {

    // var newWidth = $fluidEl.width();
    // console.log(newWidth);

    // Resize all videos according to their own aspect ratio
    $vimeoVideos.each(function() {
      var $el = $(this);
      var $parent = $el.parent();
      var newWidth = $parent.width();
      // console.log(newWidth);
      if ( $('body').hasClass('category-video')) {
        newHeight = newWidth * $el.data('aspectRatio') * .81;
      } else {
        newHeight = newWidth * $el.data('aspectRatio');
      }
      $el
      .width(newWidth)
      .height(newHeight);

    });

    $youTubeVideos.each(function() {

      var $el = $(this);
      var $parent = $el.parent();
      var newWidth = $parent.width();
      $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio') );

    });

  // Kick off one resize to fix all videos on page load
  }).resize();

  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    // closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom mfp-zoom-out-cur', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    }
  });

  $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
    //single image popup
    if ($(this).parents('.gallery').length == 0) {
      $(this).magnificPopup({type:'image'});
    }
  });

  $('.reveal-trigger').magnificPopup({
    type:'inline',
    midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
  });

  $('.dropdown-trigger > a').click(function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('open');
  });

  $(window).resize(function() {
    if ( $(window).width() > 880 ) {
      $('.dropdown-trigger').removeClass('open');
    }
  });

  // $('.reveal-trigger').click(function(e) {
  //   e.preventDefault();
  //   var t = $(this).attr('data-target');
  //   var a = $(this).next('')
  //   $(t).show('slow');
  // });

  if ($('.banner-slick').length) {
    $('.banner-slick').slick({
      autoplay: true,
      arrows: false
    });
  }
});