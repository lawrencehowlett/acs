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
		<% if $MicroMenus %>
			<nav class="footer-section cols footer-nav">
				<div class="col footer-menu">
					<h4 class="footer-menu-title">$Title</h4>
					<% if $MicroMenus %>
					<ul class="menu">
						<% loop $MicroMenus %>
							<li><a href="$Link" title="Go to $Title page">$MenuTitle.XML</a></li>
						<% end_loop %>
					</ul>
					<% end_if %>
				</div>
			</nav>
		<% end_if %>

		<section class="footer-section">
			<p class="cta">
				<img src="$ThemeDir/img/IIP_LOGO_BLACK.png"> 
				<img src="$ThemeDir/img/ISO2011.png">
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