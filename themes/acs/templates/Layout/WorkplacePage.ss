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

		</section>	

	<% end_loop %>
<% end_if %>

<% include FeaturedResources %>
