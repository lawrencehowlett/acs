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
		</section>
	<% end_loop %>
<% end_if %>

<% include FeaturedResources %>