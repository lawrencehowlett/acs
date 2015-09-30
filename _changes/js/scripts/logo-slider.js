$(".logo-slider").each(function() {
	var container = $(this).parent();
	var contentWidth = container.innerWidth();
	var slideWidth = 180;
	var maxSlides = Math.floor(contentWidth / slideWidth);

	var slider = $(".logo-slider").bxSlider({
		auto: true,
		minSlides: 2,
		maxSlides: maxSlides,
		slideWidth: slideWidth,
		slideMargin: 10
	});

	$(window).resize(function() {
		contentWidth = container.innerWidth();
		maxSlides = Math.floor(contentWidth / slideWidth);
		slider.reloadSlider({
			auto: true,
			minSlides: 2,
			maxSlides: maxSlides,
			slideWidth: slideWidth
		})
	})
});

