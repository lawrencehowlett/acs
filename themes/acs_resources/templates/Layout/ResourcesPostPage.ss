<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section text-content blog">
	<div class="inside cf">
		<section class="main-reading">
			<article class="blog-content reading">
				$Content 
			</article>
		</section>

		<ul class="blog-social">
			<li><span class='social facebook st_facebook_custom' displayText='Facebook'></span></li>
			<li><span class='social googleplus st_twitter_custom' displayText='Tweet'></span></li>
			<li><span class='social twitter st_linkedin_custom' displayText='LinkedIn'></span></li>
			<li><span class='social linkedin st_googleplus_custom' displayText='Google +'></span></li>
		</ul>

	</div>
</section>

<% if $RelatedResources %>
	<section class="page-section mt30">

		<div class="inside">
			<h2 class="section-title">Related Resources</h2>

			<p class="all">
				<a href="$AllResourcesPage.Link" title="Go to $AllResourcesPage.Title">View all resources</a>
			</p>
		</div>
		<div class="res-slider double-slider inside">
			<a href="javascript:void(0);" class="slider-nav next">Next</a>
			<a href="javascript:void(0);" class="slider-nav prev">Previous</a>
			<div class="slider-wrapper">
				<ul class="slider-items">
					<% loop $RelatedResources %>
						<li class="resource slider-item">
							<img src="$FeaturedImage.CroppedImage(220, 300).Link" alt="$FeaturedImage.Title" class="resource-thumbnail">
							<h3 class="resource-title">$Title.XML</h3>
							<% if $Summary %>$Summary<% else %>$Excerpt<% end_if %>
							
							<% if $DocumentTypes %>
								<p class="resource-category">
									<% loop $DocumentTypes %>
										<a href="javascript:void(0);">$Title</a>
									<% end_loop %>
								</p>
							<% end_if %>

							<p class="more">
								<a href="$Link" title="Go to $Title.XML">More info</a>
							</p>
						</li>
					<% end_loop %>
				</ul>
			</div>
		</div>
	</section>
<% end_if %>
