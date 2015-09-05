<article class="ebook-descr">
	<h1>$Title</h1>
	
	<% if $FeaturedImage %>
		<p class="ebook-cover">
			<img src="$FeaturedImage.Link" alt="$FeaturedImage.Title">
		</p>
	<% end_if %>
	$Content

</article>
<div class="form">
	$Form
</div>