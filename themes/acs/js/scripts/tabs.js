$(".tab-section").each(function() {
	var el = $(this);
	var tabs = el.find(".tab a");
	var tabContent = el.find(".tab-content");

	tabs.click(function(event) {
		event.preventDefault();
		tabs.removeClass("active");
		$(this).addClass("active");
		var newTab = $(this).attr("href");

		el.find(".tab-content.active").fadeOut(300, function() {
			$(this).removeClass("active");
			$(newTab).fadeIn(300, function() {
				$(this).addClass("active");
			})
		});
	});
});