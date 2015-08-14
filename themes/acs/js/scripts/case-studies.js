$(".cs-item.slideshow").each(function(){
	var el = $(this);
	var images = el.find("img");
	var links = el.find(".cs-item-pager a");

	links.click(function(event) {
		event.preventDefault();
		var index = $(this).prevAll("a").length;
		el.find("img.active").removeClass("active");
		images.eq(index).addClass("active");
		links.removeClass("active");
		$(this).addClass("active");
	})
});