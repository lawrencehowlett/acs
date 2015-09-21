<div class="widget welcome">
	<h3 class="widget-title">$Title</h3>
	<div class="widget-inner">
		<% if $FeaturedImage %>
			<img src="$FeaturedImage.Link" alt="$FeaturedImage.Title">
		<% end_if %>
		<div class="text">
			$Text
		</div>
	</div>
</div>
