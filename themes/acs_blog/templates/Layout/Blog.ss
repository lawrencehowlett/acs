<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title"><% if $CurrentCategory %>$CurrentCategory.Title<% else %>$Title<% end_if %></h1>
		$Description
	</div>
</section>

<section class="page-section text-content blog posts">
	<div class="inside cf">
		<section class="blog-main left">

			<% if $PaginatedList.Exists %>
				<% loop $PaginatedList %>
					<article class="blog-content reading">
						<h4 class="category">
							<% loop $Categories %>
								<a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %> <% end_if %>
							<% end_loop %>
						</h4>
						<h2 class="post-title">
							<a href="$Link" title="Read more about $Title"><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></a>
						</h2>
						<div class="additional">
							<div class="date info">$PublishDate.Format('M d, Y') <span class="blue">/</span></div>
							<div class="author info">By <a href="#">$Authors.First.FirstName $Authors.First.Surname</a> <span class="blue"></span></div>
							<!--<div class="comments info">4 comments</div>-->
						</div>
						
						<% if $FeaturedImage %>
							<div class="post-image">
								<img src="$FeaturedImage.CroppedImage(584, 380).Link" alt="$FeaturedImage.Title">
							</div>
						<% end_if %>

						<p class="lead"><% if $Summary %>$Summary<% else %>$Excerpt<% end_if %></p>

						<p class="more">
							<a href="$Link" title="Read more about $Title">Read more</a>
						</p>
					</article>
				<% end_loop %>
			<% end_if %>

			<% with $PaginatedList %>
				<% if $MoreThanOnePage %>
					<div class="pagination">
						<ul>
							<% if $NotFirstPage %>
								<li class="prev"><a href="{$PrevLink}" title="Go to previous posts">Previous</a></li>
							<% end_if %>

							<% loop $Pages %>
								<li <% if $CurrentBool %>class="active"<% end_if %>>
									<a href="$Link" title="Go to page $PageNum">$PageNum</a>
								</li>
							<% end_loop %>

							<% if $NotLastPage %>
								<li class="next"><a href="{$NextLink}" title="Go to next posts">Next</a></li>
							<% end_if %>
						</ul>
					</div>
				<% end_if %>
			<% end_with %>

		</section>

		<aside class="blog-sidebar right">
			<% include BlogSideBar %>

			<% if $FeaturedBlogPosts %>
				<div class="widget featured">
					<h3 class="widget-title">Featured posts</h3>
					<div class="widget-inner">
						<ul class="post-list text">
							<% loop $FeaturedBlogPosts %>
								<li>
									<a href="$Link" title="Go to $Title.XML page">
										<% if $FeaturedImage %>
											<div class="img">
												<img src="$FeaturedImage.CroppedImage(570, 330).Link" alt="$FeaturedImage.Title">
											</div>
										<% end_if %>
										<div class="title">$Title.XML</div>
									</a>
								</li>
							<% end_loop %>
						</ul>
					</div>
				</div>
			<% end_if %>

		</aside>
	</div>
</section>