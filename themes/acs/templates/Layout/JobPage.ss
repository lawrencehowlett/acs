<section class="page-section page-header" style='<% if $JobListingPage.Banner %>background-image: url("$JobListingPage.Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$JobListingPage.Title</h1>
		$JobListingPage.Description
	</div>
</section>


<section class="page-section text-content blog">
	<div class="inside cf">
		<section class="blog-main">
			<article class="blog-content reading">
				<h2>$JobDetails.Title</h2>
				$JobDetails.Content
			</article>	
		</section>

		<aside class="blog-sidebar">
			<div class="widget">
				<h3 class="widget-title">Categories</h3>
				<ul class="side-menu">
					<% loop $Categories %>
						<li>
							<a href="$Top.JobListingPage.Link/category/$URLSegment" class="$Top.IsCurrentCategory($ID)">$Title</a>
						</li>
					<% end_loop %>
				</ul>
			</div>

			<% if $FeaturedJobs %>
				<div class="widget">
					<h3 class="widget-title">Featured Jobs</h3>
					<ul class="side-menu">
						<% loop $FeaturedJobs %>
							<li>
								<a href="$Top.URLSegment/$URLSegment">$Title</a>
							</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>

		</aside>

	</div>
</section>