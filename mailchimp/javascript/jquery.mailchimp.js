(function($) {
    $(document).ready(function(){
        
    	$.fn.mailchimp = function(){

    		$(this).submit(function(e){

	    		var postData = $(this).serializeArray();
	    		var formURL = $(this).attr('action');
	    		var obj = $(this);

    			obj.find('button[type="submit"]').html('Loading ...');

    			$.ajax({
    				url: formURL,
    				type: 'POST',
    				data: postData,
    				dataType: 'JSON',
    				success: function(data) {
    					if (data.success) {
    						obj.find('p.message').removeClass('bad').addClass('good').text(data.message).show();
    					} else {
    						obj.find('p.message').removeClass('good').addClass('bad').text(data.message).show();
    					}

    					obj.find('button[type="submit"]').text('Subscribe');
                        obj.trigger('reset');
    				}
    			});

    			e.preventDefault();
    		});
    	}
    })
})(jQuery);