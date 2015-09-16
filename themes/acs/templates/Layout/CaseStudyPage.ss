<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section text-content">
	<div class="inside cf">
		<article class="reading cs-content">
			$Content
			<h2>$GalleryImagesTitle</h2>
			<p class="all">
				<a href="$GalleryImagesRedirectPage.Link" title="$GalleryImagesRedirectPage.Title">See all projects</a>
			</p>
			<ul class="gallery cols separated">
				<% loop $GalleryImages %>
					<li class="col col2">
						<a href="$Link" class="image">
							<img src="$PaddedImage(400, 300).Link">
						</a>
					</li>
				<% end_loop %>
			</ul>
			<div class="addthis_native_toolbox"></div>			
			<!--<div class="social-share">
				<img src="$ThemeDir/img/temp/social/fb1.png" alt="">
				<img src="$ThemeDir/img/temp/social/fb2.png" alt="">
				<img src="$ThemeDir/img/temp/social/google.png" alt="">
				<img src="$ThemeDir/img/temp/social/twitter.png" alt="">
				<img src="$ThemeDir/img/temp/social/linkedin.png" alt="">
			</div>-->
		</article>
		<aside class="cs-sidebar">
			<% if $Features %>
				<% loop $Features %>
					<div class="cs-feature">
						<div class="inside">
							<p class="img">
								<img src="$Icon.Link" alt="$Icon.Title">
							</p>
							<h4 class="feature-title">$Title</h4>
							<p class="feature-data">$Description</p>
						</div>
					</div>
				<% end_loop %>
			<% end_if %>
		</aside>
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>
		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetSpeakToSpecialist' %>
				<div class="decoration" style="background: rgba(0, 0, 0, 0) url('$FeaturedImage.Link') no-repeat scroll 100% 0;"></div>
				$Top.SpecialistsForm
			<% end_if %>

			<% if $ClassName == 'BlockWidgetResources' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>

					<% if $AllResourcesPage %>
						<p class="all">
							<a href="$AllResourcesPage.Link" title="Go to $AllResourcesPage.Title">View all resources</a>
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
									<img src="$RedirectPage.FeaturedImage.CroppedImage(220, 300).Link" alt="$RedirectPage.FeaturedImage.Title" class="resource-thumbnail">
									<h3 class="resource-title">$RedirectPage.Title.XML</h3>
									<% if $RedirectPage.Summary %>$RedirectPage.Summary<% else %>$RedirectPage.Excerpt<% end_if %>
									
									<% if $RedirectPage.DocumentTypes %>
										<p class="resource-category">
											<% loop $RedirectPage.DocumentTypes %>
												<a href="javascript:void(0);">$RedirectPage.Title</a>
											<% end_loop %>
										</p>
									<% end_if %>

									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML">More info</a>
									</p>
								</li>
							<% end_loop %>
						</ul>
					</div>
				</div>			
			<% end_if %>

		</section>
	<% end_loop %>
<% end_if %>