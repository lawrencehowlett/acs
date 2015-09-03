<% if $Widgets %>
	<% loop $Widgets %>
		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetSpinningBanner' %>
				<ul class="slider-navigation">
					<% loop $SpinningBanners %>
						<li>
							<a href="javascript:void(0);" class="slide-link $ExtraClass <% if $First %>active<% end_if %>" data-slide="$Top.getListIndex($Pos)">$Title</a>
						</li>
					<% end_loop %>
				</ul>
				<div class="viewport">
					<div class="slider-content">
						<% loop $SpinningBanners %>
							<div class="slide">
								<div class="header-slide-bg slide-background" data-image="$Image.Link"></div>
								<div class="inside slide-content">
									$Content
									<% if $RedirectPage %>
										<p class="more">
											<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
										</p>
									<% end_if %>
								</div>
							</div>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetVideo' %>
				<div class="inside cf">
					<div class="video-text">
						<h2 class="section-title">$Title</h2>
						$Content
						<% if $RedirectPage %>
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title page">$ButtonText</a>
							</p>
						<% end_if %>
					</div>
					<div class="video-movie">
						<div class="video-placeholder">
							<% if $Image %>
								<img src="$Image.Link" alt="$Image.Title">
							<% end_if %>
							<a href="$VideoURL" class="html5lightbox play"></a>
						</div>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetCaseStudies' %>
				<section class="page-section cs-showcase navigated-slider">
					<ul class="slider-navigation">
						<% loop $CaseStudies %>
						<li>
							<a href="javascript:void(0);" class="slide-link <% if $First %>active<% end_if %>" data-slide="$Top.getListIndex($Pos)">
								<img src="$Icon.Link" alt="$Icon.Title">
							</a>
						</li>
						<% end_loop %>
					</ul>
					<div class="viewport">
						<div class="slider-content">
							<% loop $CaseStudies %>
								<article class="slide">
									<div class="cs-slide-bg slide-background" data-image="$Image.Link"></div>
									<div class="inside">
										<div class="slide-content cf">
											<h2 class="section-title">$Title</h2>	
											$Content

											<% if $RedirectPage %>
												<p class="more">
													<a href="$RedirectPage.Link">$ButtonText</a>
												</p>
											<% end_if %>
										</div>
									</div>
								</article>
							<% end_loop %>
						</div>
					</div>
				</section>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetShowcase' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="viewport">
					<ul class="slider-navigation">
						<% loop $ShowcaseItems %>
						<li>
							<a href="javascript:void(0);" data-slide="$Top.getListIndex($Pos)" class="slide-link team <% if $First %>active<% end_if%>">$TabTitle</a>
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

		</section>
	<% end_loop %>
<% end_if %>

<% include FeaturedResources %>