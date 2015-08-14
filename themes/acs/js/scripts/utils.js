// ie detection
function isIE() {
    var ua = window.navigator.userAgent;
    var ie = false;
    if (/MSIE 9/i.test(ua)) ie = 9;
    if (/MSIE 10/i.test(ua)) ie = 10;
    if (/rv:11.0/i.test(ua)) ie = 11;
    return ie;
}

$(document).ready(function() {
  var ie = isIE();
  if (ie !== false) {
    $("html").addClass("ie ie" + ie);
  }
});

// smooth scrolling for anchor links
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
});

/*
A new jquery object method: detecting if  the element has reached a certain point on the screen while scrolling
parameters: 
where: the point which we expect the element to reach (a fraction of screen height: 0 = top of screen, 1 = bottom, 0.5 = middle)
callback: the function to call when the point has been reached
*/

jQuery.fn.extend({
  checkPosition: function(where, callback) {
    var elementPos = $(this).offset().top;
    var scrolled = $(window).scrollTop() + where * $(window).innerHeight();
    if (scrolled > elementPos) {
      if (typeof callback == 'function') {
          callback.call(this);
      }
    }
  }

});

/*
Sticky main navigation - the nav sticks to the top of the screen when page is scrolled beyond its position
and un-sticks when scrolled back or screen width is smaller.
*/

$(window).on("scroll resize load", function() {
  var scrolled = $(window).scrollTop();
  var threshold = 80;
  if (scrolled > threshold && !$(".header").hasClass("sticky")) {
    $(".header").addClass("sticky");
  } else if (scrolled <= threshold) {
    $(".header").removeClass("sticky");
  }
});

/* Navigation menu toggling */
$(".menu-toggle").click(function(event) {
  event.preventDefault();
  $(this).siblings(".menu").stop(true, true).slideToggle();
});

/* custom select */
$(".select").each(function() {
  var value = $(this).find(".value, .select-val");
  var select = $(this).find("select");
  select.change(function() {
    var text = select.find("option:selected").text();
    value.text(text);
  });
})

/* clickable boxes */
$(".clickable").click(function() {
  var url = $(this).find("a").eq(0).attr("href");
  window.location = url;
})

$(document).ready(function(){
  var timeline = $('.timeline .box');
    timeline.mCustomScrollbar({
      theme: "dark-3",
      horizontalScroll: true,
      axis: "x",
      setWidth: true,
      scrollbarPosition: "inside",
      scrollInertia: 300,
      alwaysShowScrollBar: 1,
      advanced:{  
        updateOnBrowserResize: true,   
        updateOnContentResize: true,
        autoExpandHorizontalScroll: true   
      } 
    });  

  timeline.fadeIn();

});
  

$(window).resize(function() {
  var timeline = $('.timeline .box');
  var width = $('.timeline .box').width();
  width--;
  timeline.css('width', width);
  console.log(width);
  timeline.mCustomScrollbar("update");
  $('.mCSB_scrollTools.mCSB_scrollTools_horizontal').css('height', '11px');

  if($(window.innerWidth) < 768) {
    timeline.mCustomScrollbar("destroy");
    timeline.css('overflow','hidden');
  }
});

$(".comments-toggle").click(function(event) {
  event.preventDefault();
})