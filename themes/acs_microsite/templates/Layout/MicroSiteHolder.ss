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
						<h2 class="section-title">$Title</h2>
						$Tagline
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

			<% if $ClassName == 'BlockWidgetImage' || $ClassName == 'BlockWidgetSimpleImage' %>
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

			<% if $ClassName == 'BlockWidgetTable' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="table">
						<table>
							<!--<tr>
								<th>Id</th>
								<th>Column heading</th>
								<th>Column heading</th>
								<th>Column heading</th>
							</tr>-->
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