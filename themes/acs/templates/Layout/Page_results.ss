<section class="page-section page-header" style='background-image: url("$ThemeDir/img/photos/headers/header-generic.jpg")'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
	    <% if $Query %>
	        <p>You searched for &quot;<strong>{$Query}</strong>&quot;</p>
	    <% end_if %>		
	</div>
</section>

<section class="page-section text-content blog posts">
	<div class="inside cf">
		<section class="left">
			<% if $Results %>
				<% loop $Results %>
					<article class="blog-content reading">
						<h2 class="post-title">
							<a href="$Link" title="Go to $Title.XML page">
								<% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %>								
							</a>
						</h2>
						<p class="lead">
							$Content.LimitWordCountXML
						</p>
						<p class="more">
							<a href="$Link" title="Read more about $Title.XML page">Read more</a>
						</p>
					</article> 
				<% end_loop %>
			<% else %>
				<article class="blog-content reading">
					<p class="lead">Sorry, your search query did not return any results.</p>
				</article>
			<% end_if %>

			<% if $Results.MoreThanOnePage %>
			<div class="pagination">
				<ul>
					<% loop $Results.Pages %>
						<% if $Results.NotFirstPage %>
							<li class="prev"><a href="$Results.PrevLink" title="View the previous page">Previous</a></li>
						<% end_if %>

						<li class="<% if $CurrentBool %>active<% end_if %>">
							<a href="$Link" title="View page number $PageNum">$PageNum</a>
						</li>

						<% if $Results.NotLastPage %>
							<li class="next">
								<a href="$Results.NextLink" title="View the next page">Next</a>
							</li>
						<% end_if %>

					<% end_loop %>
				</ul>
			</div>
			<% end_if %>

		</section>
	</div>
</section>

