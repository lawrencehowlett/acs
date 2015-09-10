$(".navigated-slider").each(function() {
	var el = $(this);
	var slider = el.find(".slider-content");
	var items = el.find(".slide");
	var maxItem = items.length-1;
	var navLinks = el.find(".slide-link");

	var current = 0;
	var speed = 500;

	function moveSlider(i, fast) {
		var itemWidth = items.outerWidth();
		var pos = -(i * itemWidth);

		navLinks.removeClass("active");
		navLinks.eq(i).addClass("active");

		if (fast) {
			slider.css("left", pos + "px");
		} else {
			slider.stop(true, true).animate({left: pos + "px"}, speed);
		}
	}

	navLinks.click(function(event) {
		event.preventDefault();
		current = $(this).data("slide");
		moveSlider(current);
	});

	// touch events
 	el.hammer().on("swipeleft", function() {
 		if (current < maxItem) {
 			current ++;
 			moveSlider(current);
 		}
 	});
 	el.hammer().on("swiperight", function() {
 		if (current > 0) {
 			current --;
 			moveSlider(current);
 		}
 	});

	$(window).bind("load resize", function() {
		moveSlider(current, true);
		if ($(window).innerWidth() >= 800 && !$(".slide-background img").length) {
			$(".slide-background").each(function() {
				var path = $(this).data("image");
				$(this).append('<img src="' + path + '" alt="">');
			})
		}
	});
})