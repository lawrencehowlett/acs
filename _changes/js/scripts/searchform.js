$(".searchform").each(function() {
	var el = $(this);
	var toggle = el.find(".search-toggle");
	var content = el.find(".search-content");

	toggle.click(function(event) {
		event.preventDefault();
		el.toggleClass("expanded");
	})
});