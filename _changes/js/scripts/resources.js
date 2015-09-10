var loadingResources = false;
$(".load-more").click(function(event){
	event.preventDefault();
	var el = $(this);
	var target = $("#" + $(this).data("target"));
	var url = $(this).attr("href");

	if(loadingResources) return false;

	loadingResources = true;
	el.addClass("loading");
	$.ajax({
		url: url,
		dataType: 'json',
		success: function(response) {
			var resTemplate = _.template('<li class="hidden resource col col2 furniture <%= filters %>"><img src="<%= picture %>" alt="" class="resource-thumbnail"><h3 class="resource-title"><%= title %></h3><p><%= text %></p><p class="resource-category"><a href="<%= category.link %>"><%= category.name %></a></p><p class="more"><a href="<%= link %>">More info</a></p></li>');
			for (var i = 0; i < response.length; i++) {
				var res = response[i];
				var newItem = $(resTemplate(res));
				target.append(newItem);				
				newItem.fadeIn(500, function() {
					$(this).removeClass("hidden");
				});
			}
			el.removeClass("loading");
			loadingResources = false;
		}
	});
});

$(".filters").each(function() {
	var el = $(this);
	var filters = el.find(".filter");
	var target = $("#" + el.data("target"));
	var items = target.children();

	filters.click(function(event){
		event.preventDefault();
		filters.removeClass("active");
		$(this).addClass("active");

		var criteria = $(this).data("criteria");
		if (criteria) {
			items.hide();
			items.each(function(){
				var item = $(this);
				if (item.hasClass(criteria)) {
					item.show();
				}
			})
		} else {
			items.show();
		}
	});
})