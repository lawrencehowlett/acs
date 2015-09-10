$(window).load(function() {
	$(".double-slider").each(function() {
		var el = $(this);
		var prevLink = el.find(".slider-nav.prev");
		var nextLink = el.find(".slider-nav.next");
		var sliderEl = el.find(".slider-items");
		var slideW = sliderEl.children().width();

		var slideMargin = $(window).innerWidth() > 600 ? 30 : 10;

		var sliderOptions = {
			slideMargin: slideMargin,
			pager: false,
			minSlides: 1,
			maxSlides: 4,
			moveSlides: 1,
			slideWidth: slideW
		};

		var slider = sliderEl.bxSlider(sliderOptions);

		$(window).resize(function(event) {
			sliderOptions.slideMargin = $(window).innerWidth() > 600 ? 30 : 10;
			sliderOptions.slideW = sliderEl.children().width();
			sliderEl.reloadSlider(sliderOptions);		
		})

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
