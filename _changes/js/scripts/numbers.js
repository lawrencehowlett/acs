$(".numbers .number").each(function() {
	var el = $(this);
	var done = false;
	var value = el.data("value");
	var suffix = el.data("suffix");
	if (!suffix) suffix = "";
	var decimalPlaces = parseInt(el.data("decimal"), 10);

	if (decimalPlaces) {
		var decimalFactor = decimalPlaces === 0 ? 1 : decimalPlaces * 10;
	}

	$(window).on("resize load scroll", function() {
		if (done) return;
		el.checkPosition(0.75, function(){
			if (decimalPlaces) {
				el.animateNumber({
      				number: value * decimalFactor,
					numberStep: function(now, tween) {
						var floored_number = Math.floor(now) / decimalFactor,
						    target = $(tween.elem);
						if (decimalPlaces > 0) {
						  floored_number = floored_number.toFixed(decimalPlaces);
						}

	        			target.text(floored_number + suffix);
      				}	
    			},
    			2000
  				);
  			} else {
  				var percent_number_step = $.animateNumber.numberStepFactories.append(suffix)
  				el.animateNumber({
					number: value,
					numberStep: percent_number_step
				});
			}
			done = true;
		});
	})
	
});