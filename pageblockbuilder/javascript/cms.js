(function ($) {
	$.entwine('ss', function ($) {

		$('.cms-row-add-button').entwine({

			'onadd': function () {

				var $this = $(this);

				$(this).on('click', function(e){

					// add the droppable rows here

					e.preventDefault();

				});

			}
		})
		
	});

})(jQuery);