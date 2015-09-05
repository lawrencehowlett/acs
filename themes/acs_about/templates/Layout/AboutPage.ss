<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>
		<section class="page-section $ExtraClass">
			<% if $ClassName == 'BlockWidgetSlider' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>

				<div class="about-slider double-slider">
					<a href="javascript:void(0);" class="slider-nav prev"></a>
					<a href="javascript:void(0);" class="slider-nav next"></a>
					<div class="slider-wrapper">
						<ul class="slider-items">
							<% loop $Items %>
							<li class="slider-item">
								<h3 class="slide-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML page">$Title</a>
								</h3>
								<p class="slide-img">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML page">
										<img src="$Image.Link" alt="$Image.Title">
									</a>
								</p>
							</li>
							<% end_loop %>
						</ul>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetGallery' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="team cols separated super-tight">
						<% loop $Images %>
							<div class="col col4 member">
								<p class="member-photo">
									<a href="javascript:void(0);">
										<img src="$Image.Link" alt="$Image.Title">
									</a>
								</p>
								<p class="member-name">
									<strong>Roger Maryflow</strong><br>Office Manager
								</p>
							</div>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'AboutStory' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>

					<section class="history">
						<section class="slider">
							<p class="slider-controls">
								<a href="javascript:void(0);" class="prev" title="Slide back">Slide back</a>
								<a href="javascript:void(0);" class="next" title="Slide forward">Slide forward</a>
							</p>
							<div class="timeline mCustomScrollbar" data-mcs-axis="x" data-mcs-theme="dark-3">
								<div class="box">

									<ul class="months cf">
										<% loop $TimeLine %>
											<li class="month <% if $HasRecord %>full<% end_if %>" data-month="$DataMonth"><span class="label">$Month<% if $StartOfYear %><br><span class="year">$Year</span><% end_if %></span></li>
										<% end_loop %>
									</ul>

								</div>
							</div>
							<div class="slider-content">
								<% loop $Entries %>
									<article class="slider-item" data-day="$Date.Format('d')" data-month="$Date.Format('m')" data-year="$Date.Format('Y')">
										<p class="img">
											<img src="$Image.Link" alt="$Image.Title">
										</p>
										<div class="slide-content">
											<p class="slide-date"><span class="year">$Date.Format('Y')</span><br>$Date.Format('d') $Date.Format('M')</p>
											<h3 class="slide-title"><a href="javascript:voide(0);">$Title</a></h3>
											$Content
										</div>
									</article>
								<% end_loop %>
							</div>
						</section>
					</section>
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

		</section>
	<% end_loop %>
<% end_if %>