<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass" <% if $BackgroundImage %>style="background-image: url('$BackgroundImage.Link')"<% end_if %>>

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					<header class="text-section-header">

						<% if $Title %>
							<h2 class="section-title">$Title</h2>
						<% end_if %>
						
						<% if $Tagline %>
							<p class="lead">$Tagline</p>
						<% end_if %>

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

			<% if $ClassName == 'BlockWidgetSimpleImage' %>
				<div class="inside">
					<article class="specialist-box cf">
						<div class="specialist-img">
							<img src="$Image.Link" alt="$Image.Title">
						</div>
						<div class="specialist-text">
							<h2 class="specialist-title">$Title</h2>
							$Content
						</div>
					</article>
				</div>
			<% end_if %>			

			<% if $ClassName == 'BlockWidgetVideo' || $ClassName == 'BlockWidgetImage' %>
				<% if $BackgroundImage || $Tagline %>
					<div class="inside cf">
						<div class="video-text">
							<h2 class="section-title">$Title</h2>
							<p class="lead">$Tagline</p>
							$Content
							<% if $RedirectPage.Link %>
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
								</p>
							<% end_if %>

						</div>
						<div class="video-movie">
							<div class="video-placeholder">
								<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">

								<% if $VideoURL %>
									<a href="$VideoURL" class="html5lightbox play"></a>
								<% end_if %>
							</div>
						</div>
					</div>
				<% else %>
					<div class="inside">
						<div class="media cf">
							<h2 class="section-title">$Title</h2>
							<div class="media-content">
								<div class="video-movie">
									<div class="video-placeholder">
										<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">

										<% if $VideoURL %>
											<a href="$VideoURL" class="html5lightbox play"></a>
										<% end_if %>
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
					<% if $Items %>
						<div class="testimonials">
							<% loop $Items %>
								<article class="testimonial">
									<div class="testimonial-image">
										<% if $Image %>
											<img src="$Image.Link" alt="$Image.Title">
										<% end_if %>
									</div>
									<div class="testimonial-text">
										<h3 class="author-name">$Title</h3>
										
										<% if $Tagline %>
											<p class="author-position">$Tagline</p>
										<% end_if %>

										$Content

										<div class="testimonial-nav">
											<a href="javascript:void(0);" class="prev"></a>
											<a href="javascript:void(0);" class="next"></a>
										</div>
									</div>
								</article>
							<% end_loop %>
						</div>
					<% end_if %>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetActionBox' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="cols cta-boxes">
						<% loop $Items %>
							<article class="cta-box box$Pos col col3 clickable">
								<p class="cta-box-img">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">
										<img src="$Image.Link" alt="$Image.Title">
									</a>
								</p>
								<h3 class="cta-box-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$Title</a>
								</h3>
								$Content
							</article>
						<% end_loop %>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSpeakToSpecialist' %>
				<% if $ActionBoxRedirectPageID %>
					<div class="brochure cf" style="background: rgba(0, 0, 0, 0) url('$ActionBoxBackgroundImage.Link') no-repeat scroll 100% 0">
						<div class="brochure-content">
							<p class="section-title">$ActionBoxTitle</p>
							<div class="brochure-text">
								<h2 class="brochure-title">$ActionBoxTagline</h2>
								$ActionBoxContent
							</div>
							<p class="download">
								<a href="$ActionBoxRedirectPage.Link" title="Go to $ActionBoxRedirectPage.Title" class="wire-button">$ActionBoxButtonText</a>
							</p>
						</div>
					</div>
				<% else %>
					<div class="decoration" style="background: rgba(0, 0, 0, 0) url('$FeaturedImage.Link') no-repeat scroll 100% 0;"></div>
				<% end_if %>
				$Top.SpecialistsForm
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

			<% if $ClassName == 'BlockWidgetWork' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<ul class="work">
						<% loop $Works %>
							<li class="work-item $ExtraClass">
								<p class="number">$Pos</p>
								<p class="work-item-img"></p>
								<h3 class="work-title">$Title</h3>
								$Content

								<% if $RedirectPage %>
									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.TItle">$ButtonText</a>
									</p>
								<% end_if %>

							</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>			

		</section>	

	<% end_loop %>
<% end_if %>