$(".video-movie").each(function() {
	var el = $(this);
	var placeholder = el.find(".video-placeholder");
	var playButton = el.find(".play");

	playButton.click(function(event){
		event.preventDefault();
	  	var video_url = $(this).attr("href");
	  	placeholder.slideUp(300, function() {
	  		el.append('<iframe width="560" height="315" frameborder="0" src="' + video_url + '?autoplay=1"></iframe>');	
	  	})
	  	
	});

  var html5lightbox_options = {
      watermark: "",
      watermarklink: ""
  };
})


