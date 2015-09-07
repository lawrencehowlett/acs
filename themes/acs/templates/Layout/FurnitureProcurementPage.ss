<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					
					<% if $SectionTitle %>
						<header class="text-section-header">
							$SectionTitle
						</header>
					<% end_if %>

					<div class="text-section-content">
						$Content
						<% if $RedirectPage %>
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>
						<% end_if %>
					</div>
				</article>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetMultipleTextImageBlock' %>
				<div class="inside teaser-list">
					<% loop $TextImageBlocks %>
						<article class="article-teaser">
							<div class="article-teaser-img">
								<img src="$Image.Link" alt="$Image.Title">
							</div>
							<div class="article-teaser-text">
								<h3 class="article-teaser-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML">$Title</a>
								</h3>
								$Content
							</div>
						</article>
					<% end_loop %>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSpeakToSpecialist' %>
				<% if not $ActionBoxRedirectPage %>
					<div class="decoration" style="background: rgba(0, 0, 0, 0) url('$FeaturedImage.Link') no-repeat scroll 100% 0;"></div>
				<% else %>
					<div class="brochure cf">
						<div class="brochure-content">
							<p class="section-title">$ActionBoxTitle</p>
							<div class="brochure-text">
								$ActionBoxContent
							</div>
							<p class="download">
								<a href="$ActionBoxRedirectPage.Link" title="Go to $ActionBoxRedirectPage.Title" class="wire-button">$ActionBoxButtonText</a>
							</p>
						</div>
					</div>
				<% end_if %>
				
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