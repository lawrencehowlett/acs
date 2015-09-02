<% if $Resources %>
<section class="page-section mt30">
	<div class="inside">
		<h2 class="section-title">$ResourcesTitle</h2>

		<% if $ResourcesRedirectPage %>
			<p class="all">
				<a href="$ResourcesRedirectPage.Link" title="Go to $ResourcesRedirectPage.Title">$RedirectButtonText</a>
			</p>
		<% end_if %>
	</div>
	<div class="res-slider double-slider inside">
		<a href="javascript:void(0);" class="slider-nav next">Next</a>
		<a href="javascript:void(0);" class="slider-nav prev">Previous</a>
		<div class="slider-wrapper">
			<ul class="slider-items">
				<% loop $Resources %>
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