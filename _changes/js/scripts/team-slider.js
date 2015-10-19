$(window).load(function() {
	$(".team-slider").each(function() {
		var el = $(this);
		var prevLink = el.find(".slider-nav.prev");
		var nextLink = el.find(".slider-nav.next");
		var sliderEl = el.find(".slider-items");
		// var slideW = sliderEl.children().width();
		var slideW = 295;

		// var slideMargin = $(window).innerWidth() > 600 ? 30 : 10;
		var slideMargin = 0;

		var minSlides = 1;
		var maxSlides = 1;

		if ($(window).innerWidth() > 480) {
			minSlides = 2;
			maxSlides = 2;
		}

		if ($(window).innerWidth() > 800) {
			minSlides = 4;
			maxSlides = 4;
		}

		var sliderOptions = {
			slideMargin: slideMargin,
			pager: false,
			minSlides: minSlides,
			maxSlides: maxSlides,
			moveSlides: 1,
			slideWidth: slideW,
			startSlide: 0
		};

		var slider = sliderEl.bxSlider(sliderOptions);

		$(window).resize(function(event) {
			// sliderOptions.slideMargin = $(window).innerWidth() > 600 ? 30 : 10;
			// sliderOptions.slideW = sliderEl.children().width();

			// sliderOptions.minSlides = $(window).innerWidth() > 600 ? 2 : 1;
			// sliderOptions.maxSlides = $(window).innerWidth() > 600 ? 2 : 1;

			sliderOptions.minSlides = 1;
			sliderOptions.maxSlides = 1;

			if ($(window).innerWidth() > 480) {
				sliderOptions.minSlides = 2;
				sliderOptions.maxSlides = 2;
			}

			if ($(window).innerWidth() > 800) {
				sliderOptions.minSlides = 4;
				sliderOptions.maxSlides = 4;
			}

			sliderEl.reloadSlider(sliderOptions);		
		});

		prevLink.click(function(event) {
			event.preventDefault();
			slider.goToPrevSlide();
		});
		
		nextLink.click(function(event) {
			event.preventDefault();
			slider.goToNextSlide();
		});
	});
});
