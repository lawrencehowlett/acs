<footer class="footer">
	
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
		<!--<section class="footer-section">
			<p>Microsite Footer Text</p>
		</section>-->

		<section class="footer-section social-section cf">
			<% if $SiteConfig.SocialServices %>
				<ul class="social">
					<% loop $SiteConfig.SocialServices %>
						<li><a href="$ExternalURL" title="Go to $Title" class="$CSS" target="_blank">$Title</a></li>
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