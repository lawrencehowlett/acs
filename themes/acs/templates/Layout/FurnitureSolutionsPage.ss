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

			<% if $ClassName == 'BlockWidgetShowcase' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="viewport">
					<ul class="slider-navigation">
						<% loop $ShowcaseItems %>
						<li>
							<a href="javascript:void(0);" data-slide="$Top.getListIndex($Pos)" class="slide-link $ExtraClass <% if $First %>active<% end_if%>">$TabTitle</a>
						</li>
						<% end_loop %>
					</ul>
					<div class="slider-content">
						<% loop $ShowcaseItems %>
							<article class="slide">
								<div class="slide-background" data-image="$BackgroundImage.Link"></div>
								<div class="inside cf">
									<div class="slide-content">
										<% if $Image %>
											<img class="slide-image" src="$Image.Link" alt="$Image.Title">
										<% end_if %>

										<% if $RedirectPage %>
											<a href="$RedirectPage.Link" class="slide-button">$ButtonText</a>
										<% end_if %>

										<h3 class="slide-title">$Title</h3>
										$Content
									</div>
								</div>
							</article>
						<% end_loop %>
					</div>
				</div>	
			<% end_if %>

			<% if $ClassName == 'BlockWidgetProjects' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="featured-slider double-slider inside">
					<a href="javascript:void(0);" class="slider-nav next">Next</a>
					<a href="javascript:void(0);" class="slider-nav prev">Previous</a>
					<div class="slider-wrapper">
						<ul class="slider-items">
							<% loop $Projects %>
								<li class="featured-project slider-item">
									<img src="$Image.PaddedImage(570, 375).Link" alt="$Image.Title" class="project-thumbnail">
									<h3 class="project-title">$Title</h3>
									<p class="project-cat"><a href="#">Desking solutions</a></p>
									<% if $RedirectPage %>
										<p class="more">
											<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">&nbsp;</a>
										</p>
									<% end_if %>
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