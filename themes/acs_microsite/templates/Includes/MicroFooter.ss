<footer class="footer">
	
	<div class="inside cf">
		<% if $SiteConfig.MicroFooterMenus %>
			<nav class="footer-section cols footer-nav">
				<% loop $SiteConfig.MicroFooterMenus %>
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
		<!--<section class="footer-section">
			<p>Microsite Footer Text</p>
		</section>-->

		<section class="footer-section social-section cf">
			<% if $SiteConfig.SocialServices %>
				<ul class="social">
					<% loop $SiteConfig.SocialServices %>
						<li><a href="$Link" title="Go to $Title" class="$CSS">$Title</a></li>
					<% end_loop %>
				</ul>
			<% end_if %>
			
			<% if $SiteConfig.FooterLegalMenus %>
				<ul class="menu legal">
					<% loop $SiteConfig.FooterLegalMenus %>
						<li><a href="$Link" title="Go to $Title.XML">$Title</a></li>
					<% end_loop %>
				</ul>
			<% end_if %>

			<p class="copyright">$SiteConfig.Copyright</p>
			
		</section>
	</div>
</footer>