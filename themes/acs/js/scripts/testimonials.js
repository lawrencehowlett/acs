$(".testimonials").each(function(){
	var el = $(this);
	var prevLink = el.find(".prev");
	var nextLink = el.find(".next");

	var sliderOptions = {
		slideMargin: 10,
		pager: false,
		minSlides: 1,
		maxSlides: 1,
		adaptiveHeight: true
	};

	var slider = el.bxSlider(sliderOptions);

	prevLink.click(function(event) {
		event.preventDefault();
		slider.goToPrevSlide();
	});
	nextLink.click(function(event) {
		event.preventDefault();
		slider.goToNextSlide();
	});
});