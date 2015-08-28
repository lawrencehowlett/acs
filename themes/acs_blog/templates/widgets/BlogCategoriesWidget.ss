<% if $Categories %>
	<div class="widget">
		<h3 class="widget-title">$Title</h3>
		<ul class="side-menu">
			<% loop $Categories %>
				<% if $BlogPosts %>
					<li><a href="$Link" class="active">$Title ($BlogPosts.Count)</a></li>
				<% end_if %>
			<% end_loop %>
		</ul>
	</div>
<% end_if %>