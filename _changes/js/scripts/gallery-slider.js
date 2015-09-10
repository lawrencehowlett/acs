$(window).load(function() {
	$(".gallery-slider").each(function() {
		var el = $(this);
		var prevLink = el.find(".slider-nav.prev");
		var nextLink = el.find(".slider-nav.next");
		var sliderEl = el.find(".gallery-slider-items");
		var slideW = sliderEl.children().width();

		var slideMargin = $(window).innerWidth() > 870 ? 165 : 0;

		var slider = sliderEl.bxSlider({
			slideMargin: slideMargin,
			pager: false,
			minSlides: 1,
			maxSlides: 3,
			moveSlides: 1,
			slideWidth: slideW,
		});

		$(window).resize(function(event) {
			slideMargin = $(window).innerWidth() > 870 ? 165 : 0;
			slideW = sliderEl.children().width();

			sliderEl.reloadSlider({
				slideMargin: slideMargin,
				pager: false,
				minSlides: 1,
				maxSlides: 3,
				moveSlides: 1,
				slideWidth: slideW,
			});		
		})


		prevLink.click(function(event) {
			event.preventDefault();
			slider.goToPrevSlide();
		});
		nextLink.click(function(event) {
			event.preventDefault();
			slider.goToNextSlide();
		});
	})
})
