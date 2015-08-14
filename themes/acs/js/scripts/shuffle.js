$(".shuffle").each(function(){
	var filters = $(this).find(".shuffle-filters a");
	var shufflable = $(this).find(".shufflable");

	shufflable.shuffle({
		itemSelector: ".shuffle-item",
		columnWidth: function(w) {
			if (w < 500) {
				return w;
			} else if (w < 850) {
				return w / 2;
			} else {
				return w / 3;
			}
		}
	});

	filters.click(function(event) {
		event.preventDefault();
		var criteria = $(this).data("criteria");

		shufflable.shuffle('shuffle', function(el, shuffle) {
			if (criteria != '') {
				return el.hasClass(criteria);	
			} else {
				return el;
			}			
		});

		filters.removeClass("active");
		$(this).addClass("active");
	});
});