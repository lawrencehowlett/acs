<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetMultipleTextImageBlock' %>
				<div class="inside teaser-list">
					<% loop $TextImageBlocks %>
						<article class="article-teaser">

							<div class="article-teaser-img">
								<img src="$Image.Link" alt="$Image.Title">
							</div>

							<div class="article-teaser-text">
								<h3 class="article-teaser-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML page">$Title</a>
								</h3>
								$Content
							</div>

						</article>
					<% end_loop %>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					<header class="text-section-header">
						<h2 class="section-title">$Title</h2>
						$Tagline
					</header>
					<div class="text-section-content">
						$Content
					</div>
				</article>
			<% end_if %>

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

			<% if $ClassName == 'BlockWidgetTable' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="table">
						<table>
							<% if $Rows %>
								<% loop $Rows %>
									<tr>
										<% loop $Columns %>
											<% if $Up.IsHeading %>
												<th>$Title</th>
											<% else %>
												<td>$Title</td>
											<% end_if %>
										<% end_loop %>
									</tr>
								<% end_loop %>
							<% end_if %>
						</table>
					</div>
				</div>			
			<% end_if %>

		</section>	

	<% end_loop %>
<% end_if %>