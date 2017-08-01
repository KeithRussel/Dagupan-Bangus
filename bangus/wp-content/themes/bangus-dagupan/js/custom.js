//COUNTER DATA
/*
(function($) {
    $('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 1000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
  

});
})(jQuery);

*/
(function($) {
   $('.count-wrap').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 5000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).unbind('inview');
        }
    });
})(jQuery);


(function($) {
var $item = $('.carousel .item');
var $item2 = $('.carousel2 .item'); 
//var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item2.eq(0).addClass('active');
//$item.height($wHeight); 
$item.addClass('full-screen');
$item2.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

//$('.carousel').carousel({
//  interval: 500,
//  pause: "false"
//});
})(jQuery);





(function($) {
    $('.search-btn').on('click', function(e){
        $(".search-form").toggle();
        $(this).toggleClass('form-class')
    });
})(jQuery);

//jQuery(document).ready(function() {
//    jQuery('#event-content').mouseenter(function() {
//       jQuery(this).fadeTo('fast', 0.25);
//    });
//    jQuery('#event-content').mouseleave(function() {
//        jQuery(this).fadeTo('fast', 1);
//    });
//});

//(function($) {
//    $(".event-data").mouseenter(function(){
//       $(".event-data .event-title").css({"color" : "#0e94b8"}); 
//    });
//    $(".event-data").mouseleave(function(){
//        $(".event-data .event-title").css({"color": "#fff"});
//    });
//})(jQuery);

(function($) {
    $('.wrap').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.counter').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).unbind('inview');
        }
    });
})(jQuery);

//DATA HOVER
//(function($) {
//    $( ".main-data .data-content" ).mouseover(function() {
//      $(".hidden-data").show();
//    });
//    $( ".hidden-data" ).mouseleave(function() {
//      $(this).hide();
//    });
//})(jQuery);

(function($) {
var readmore = $('.hidden-desc a');
$.each(readmore, function(){
    $(this).closest('.hidden-desc').find('p').last().append(this);
});
})(jQuery);