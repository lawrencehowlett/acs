<footer class="footer">
	<% if $Teasers %>
	<div class="inside cols teasers">
		<% loop $Teasers %>
			<article class="col col3 footer-teaser" style="background-image: url('$Background.Link');">
				<h3 class="footer-teaser-title">$Title</h3>
				$Content
				<p class="more">
					<a href="<% if $StartLiveChat %>javascript:void(0);<% else %>$RedirectPage.Link<% end_if %>" class="<% if $StartLiveChat %>livechat<% end_if %>" title="Go to $RedirectPage.Title.XML page">$ButtonText</a>
				</p>
			</article>
		<% end_loop %>
	</div>
	<% end_if %>

	<div class="inside cf">
		<% if $SiteConfig.FooterMenus %>
			<nav class="footer-section cols footer-nav">
				<% loop $SiteConfig.FooterMenus %>
					<div class="col footer-menu">
						<h4 class="footer-menu-title">$Title</h4>
						<ul class="menu">
							<% loop $Pages %>
								<li><a href="$Page.Link" title="Go to $Page.Title page">$Page.MenuTitle.XML</a></li>
							<% end_loop %>
						</ul>
					</div>
				<% end_loop %>
			</nav>
		<% end_if %>

		<section class="footer-section">
			<p class="cta">
				<a href="$SiteConfig.FooterActionBoxRedirectPage.Link" title="Go to $SiteConfig.FooterActionBoxRedirectPage.Title" class="cta-btn">$SiteConfig.FooterActionBoxButtonText</a>
			</p>
		</section>

		<section class="footer-section social-section cf">
			
			<% if $SiteConfig.SocialServices %>
				<ul class="social">
					<% loop $SiteConfig.SocialServices %>
						<li>
							<a href="$ExternalURL" title="Go to $Title" class="$CSS" target="_blank">
							<% if $Icon %>
								<div class="img">
									<img src="$Icon.Link" alt="$Icon.Title">
								</div>
							<% end_if %>
							$Title</a>
						</li>
					<% end_loop %>
				</ul>
			<% end_if %>

			<% if $SiteConfig.FooterLegalMenus %>
				<ul class="menu legal">
					<% loop $SiteConfig.FooterLegalMenus %>
						<li><a href="$Page.Link" title="Go to $Page.Title.XML">$Page.Title</a></li>
					<% end_loop %>
				</ul>
			<% end_if %>

			<p class="copyright">$SiteConfig.Copyright</p>
			<p class="copyright">Responsive Web Design by <a href="https://www.newedge.co.uk/">Newedge</a></p>
		</section>
	</div>
</footer>