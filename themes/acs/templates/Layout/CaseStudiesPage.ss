<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section shuffle mt60">
	<div class="inside">
		<ul class="tabs shuffle-filters">
			<li class="tab">
				<a href="javascript:void(0);" class="filter active" data-criteria="">All</a>
			</li>
			<% if $Categories %>
				<% loop $Categories %>
				<li class="tab">
					<a href="javascript:void(0);" class="filter" data-criteria="$CodeIdentifier">$Title</a>
				</li>
				<% end_loop %>
			<% end_if %>
		</ul>
		<ul class="case-studies shufflable" id="caseStudyList">
			<% loop $PaginatedList %>
				<li class="cs-item shuffle-item <% if $Categories %><% loop $Categories %> $CodeIdentifier<% end_loop %><% end_if %> $FeaturedImageExtraClass <% if $FeaturedImages.Count > 1 %>slideshow<% end_if %>">
					<% if $FeaturedImages %>
						<% loop $FeaturedImages %>
							<img src="$Link" alt="" class="cs-image <% if $First %>active<% end_if %>">
						<% end_loop %>
					<% end_if %>
					<a href="$Link" title="Go to $Title.XML page" class="cs-item-overlay"></a>

					<% if $FeaturedImages.Count > 1 %>
						<p class="cs-item-pager">
							<% loop $FeaturedImages %>
								<a href="javascript:void(0);" class="<% if $First %>active<% end_if %>">$Pos</a>
							<% end_loop %>
						</p>
					<% end_if %>
					<div class="cs-item-content">
						<h3 class="cs-item-title">
							<a href="$Link" title="Go to $Title.XML page">$Title.XML</a>
						</h3>
						<% if $Summary %>$Summary<% else %>$Excerpt<% end_if %>
					</div>
				</li>
			<% end_loop %>
		</ul>
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">
			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					<header class="text-section-header">
						$SectionTitle
					</header>
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

			<% if $ClassName == 'BlockWidgetGallery' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>

				<% if $Images %>
					<div class="gallery-slider">
						<a href="javascript:void(0);" class="slider-nav prev"></a>
						<a href="javascript:void(0);" class="slider-nav next"></a>
						<div class="slider-wrapper">
							<ul class="gallery-slider-items">
								<% loop $Images %>
									<li>
										<a href="$Image.Link" class="image">
											<img src="$Image.SetRatioSize(580, 400).Link" alt="$Image.Title">
										</a>
									</li>
								<% end_loop %>
							</ul>
						</div>
					</div>
				<% end_if %>

			<% end_if %>

			<% if $ClassName == 'BlockWidgetVideo' %>
				<div class="inside">
					<div class="media cf">
						<h2 class="section-title">$Title</h2>
						<div class="media-content">
							<div class="video-movie">
								<div class="video-placeholder">
									<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">
									<a href="$VideoURL" class="html5lightbox play"></a>
								</div>
							</div>
						</div>
						<div class="media-description">
							$Content
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>							
						</div>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetImage' %>
				<div class="inside">
					<div class="media cf">
						<h2 class="section-title">$Title</h2>
						<div class="media-content">
							<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">
						</div>
						<div class="media-description">
							$Content
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>							
						</div>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetTab' %>
				<div class="inside tab-section">
					<h2 class="section-title">$Title</h2>
					<% if $Items %>
						<ul class="tabs" data-target="resourceList">
							<% loop $Items %>
								<li class="tab">
									<a href="#tab{$ID}" class="<% if $First %>active<% end_if %>" data-criteria="tab{$ID}">$Title</a>
								</li>
							<% end_loop %>
						</ul>
						<% loop $Items %>
							<div class="tab-content <% if $First %>active<% end_if %>" id="tab{$ID}">
								$Content
								<% if $RedirectPage %>
									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
									</p>
								<% end_if %>
							</div>
						<% end_loop %>
					<% end_if %>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSlider' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="testimonials">
						<% loop $Items %>
							<article class="testimonial">
								<div class="testimonial-image"><img src="$Image.Link" alt="$Image.Title"></div>
								<div class="testimonial-text">
									<h3 class="author-name">$Title</h3>
									$Content
									<div class="testimonial-nav">
										<a href="javascript:void(0);" class="prev"></a>
										<a href="javascript:void(0);" class="next"></a>
									</div>
								</div>
							</article>
						<% end_loop %>
					</div>
				</div>			
			<% end_if %>

		</section>	

	<% end_loop %>
<% end_if %>