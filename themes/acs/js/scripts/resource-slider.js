/*
 * Resource slider behavior
 */

$(".res-slider, .featured-slider").each(function(){
	// init
	var el = $(this);
	var slider = el.find(".items");
	var items = slider.find(".slider-item");
	var forward = el.find(".next");
	var back = el.find(".prev");
	var maxItem = items.length - 1;

	var speed = 500;
	var current = 0;

	// slider animating function

	function moveSlider(i, fast) {
		var itemWidth = items.outerWidth();
		var pos = -(i * itemWidth);

		if (fast) {
			slider.css("left", pos + "px");
		} else {
			slider.stop(true, true).animate({left: pos + "px"}, speed);
		}
	}

	// events

	forward.click(function(event) {
		event.preventDefault();
		if (current < maxItem) {
			current ++;
			moveSlider(current);
		}
	});

	back.click(function(event) {
		event.preventDefault();
		if (current > 0) {
			current --;
			moveSlider(current);
		}
	});

	// touch events
 	el.hammer().on("swipeleft", function() {
 		forward.click();
 	});
 	el.hammer().on("swiperight", function() {
 		back.click();
 	});

	$(window).bind("load resize", function() {
		moveSlider(current, true);
	});
});