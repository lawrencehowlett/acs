$(".testimonials").each(function(){
	var el = $(this);
	var prevLink = el.next().find(".prev");console.log(prevLink);
	var nextLink = el.next().find(".next");

	var sliderOptions = {
		slideMargin: 10,
		pager: false,
		minSlides: 1,
		maxSlides: 1,
		adaptiveHeight: true,
		controls: false
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