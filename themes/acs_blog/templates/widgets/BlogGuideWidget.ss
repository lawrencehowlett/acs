<div class="widget guide">
	<h3 class="widget-title">$Title</h3>
	<div class="widget-inner">
		<p class="lead">$SubTitle</p>
		<div class="text">
			$Text
			<% if $RedirectPage %>
				<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML"><button>$ButtonText</button></a>
			<% end_if %>
		</div>
	</div>
</div>