$(window).on("load resize", function() {
	if ($(window).innerWidth() >= 1200) {
		$(".video-section").each(function() {
			var img = $(this).data("bg");
			$(this).css("background-image", "url(" + img + ")");
		})
	}
})