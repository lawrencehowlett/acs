$(".history").each(function(){
  var el = $(this);
  var slider = el.find(".slider");
  var sliderContent = slider.find(".slider-content");
  var items = slider.find(".slider-item");
  var backButton = el.find(".prev");
  var forwardButton = el.find(".next");
  var timeline = slider.find(".months");
  var monthWidth = timeline.find(".month").outerWidth();
  var timelineElements = timeline.find('month');
  var currentItem = 0;
  var maxItem = items.length - 1;
  var speed = 500;
  var animating = false;
  var timelineBox = el.find(".box");
  var month = timeline.find(".month.full");
  var monthsLength = month.length;
  timeline.width(monthWidth * $(".month").length);
  // initial timeline position
  if (timeline.length > 0) moveTimeline(0, true);


  // moving the slider
  function moveSlider(current, fast) {  
    var distance = items.width() + 30;
    var pos = -(current * distance);

    if (fast) {
      sliderContent.css("left", pos + "px");
      if (timeline.length > 0) moveTimeline(current, fast);
    } else {
      animating = true;
      sliderContent.animate({left: pos + "px"}, speed, function(){
        animating = false;
      }); 
      if (timeline.length > 0) moveTimeline(current);

    }
  }

  /*
  Moving the timeline

  Timeline position is relative. Basically, timeline is positioned on the left of its container (.box), which has a padding.
  The arrow's position is the container's padding + 80.
  The calculated position is just an offset relative to the initial timeline position.
  */
  function moveTimeline(current, fast) {
    var item = items.eq(current);
    var itemDate = item.data("year") + "-" + item.data("month");
    var itemDay = item.data("day");
    var timePos = 0;

    var currentMonth = timeline.find('[data-month="' + itemDate + '"]');
    var timePos = currentMonth.prevAll(".month").length * monthWidth - 250;

    timeline.find(".month").removeClass("current");
    currentMonth.removeClass("future").addClass("current");
    currentMonth.prevAll(".month").addClass("future");
    currentMonth.nextAll(".month").removeClass("future");

    if (fast) {
      timeline.parent().scrollLeft(timePos);
    } else {
      timeline.parent().animate({scrollLeft: timePos}, 500);
    }
    timelineBox.mCustomScrollbar('scrollTo', timePos);
  }

  function checkingCurrentForward() {
    currentItem++;
    checkCurrentItem();
    moveSlider(currentItem);

  }

  function checkingCurrentBackward() {
    currentItem--;
    checkCurrentItem(); 
    moveSlider(currentItem);

  }

  function checkCurrentItem(){
    if ( currentItem > maxItem ) currentItem = 0;
    if ( currentItem < 0 ) currentItem = maxItem;
  }

  /*
  Click event listeners on slider navigation buttons
  */
  function storyChange(obj) {
    timeline.find(".month").removeClass("current");
    $(obj).removeClass("future").addClass("current");   
    $(obj).prevAll(".month").addClass("future");
    $(obj).nextAll(".month").removeClass("future");
    var year = $(obj).data('month').slice(0,4);
    var month = $(obj).data('month').slice(5,7);
    var slide = sliderContent.find('.slider-item[data-year="' + year + '"][data-month="' + month + '"]');
    var slideToGo = slide.index();
    if( slideToGo ){
      currentItem = slideToGo;
      moveSlider(currentItem);
    }
  }

  forwardButton.click(function(event) { var $this = this;
    event.preventDefault();
    checkingCurrentForward();
  });

  backButton.click(function(event) {
    event.preventDefault();
    checkingCurrentBackward();
  });

  //Checking date on clicked element on the timeline 
  month.click(function(event) { var $this = this;
    event.preventDefault();
    storyChange($this);
  });

  // touch events
  el.hammer().on("swipeleft", function() {
    forwardButton.click();
  });
  el.hammer().on("swiperight", function() {
    backButton.click();
  });

  $(window).on("load resize", function() {
    moveSlider(currentItem, true);
  });

});