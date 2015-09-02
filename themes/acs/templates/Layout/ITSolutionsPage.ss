<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass" style="background-image: url('$BackgroundImage.Link');">
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

			<% if $ClassName == 'BlockWidgetVideo' %>
				<div class="inside cf">
					<div class="video-text">
						<h2 class="section-title">$Title</h2>
						$Content
						<% if $RedirectPage %>
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>
						<% end_if %>
					</div>
					<div class="video-movie">
						<div class="video-placeholder">
							<img src="$Image.Link" alt="$Image.Title">
							<a href="$VideoURL" class="html5lightbox play"></a>
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

			<% if $ClassName == 'BlockWidgetActionBox' %>
				<div class="inside">
					<div class="cols item-boxes">
						<% loop $Items %>
							<article class="item-box col col2">
								<div class="item-img">
									<img src="$Image.Link" alt="$Image.Title">
								</div>
								<h3 class="item-title">$Title</h3>
								$Content

								<% if $RedirectPage %>
									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
									</p>
								<% end_if %>
							</article>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetGallery' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<ul class="logo-slider">
						<% loop $Images %>
							<li>
								<img src="$Image.Link" alt="$Image.Title">
							</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetGallery' %>
				<div class="inside">
					<h2 class="section-title">Resources</h2>
					<p class="all"><a href="resources.php">View all resources</a></p>
				</div>
				<div class="res-slider double-slider inside">
					<a href="#" class="slider-nav next">Next</a>
					<a href="#" class="slider-nav prev">Previous</a>
					<div class="slider-wrapper">
						<ul class="slider-items">
							<li class="resource slider-item">
								<img src="img/temp/photos/res01.jpg" alt="" class="resource-thumbnail">
								<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
								<p class="resource-category"><a href="#">Eguide</a></p>
								<p class="more"><a href="#">More info</a></p>
							</li>
						</ul>
					</div>
				</div>				
			<% end_if %>

			<% if $ClassName == 'BlockWidgetTab' %>
				<ul class="slider-navigation">
					<% loop $Items %>
						<li>
							<a href="javascript:void(0);" class="slide-link active" data-slide="$Top.getListIndex($Pos)">
								<% if $TabIcon %>
									<img src="$TabIcon.Link" alt="$TabIcon.Title">
								<% end_if %>
							</a>
						</li>
					<% end_loop %>
				</ul>
				<div class="viewport">
					<div class="slider-content">
						<% loop $Items %>
							<article class="slide">
								<div class="cs-slide-bg slide-background" data-image="$Image.Link"></div>
								<div class="inside">
									<div class="slide-content cf">
										<h2 class="section-title">$Title</h2>	
										$Content
										<% if $RedirectPage %>
											<p class="more">
												<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
											</p>
										<% end_if %>
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