<footer class="footer">
	<div class="inside cols teasers">
		<article class="col col3 footer-teaser" style="background-image: url('$ThemeDir/img/temp/photos/teaser01.jpg');">
			<h3 class="footer-teaser-title">Speak to an ACS specialist</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
			<p class="more"><a href="">Live chat</a></p>
		</article>
		<article class="col col3 footer-teaser" style="background-image: url('$ThemeDir/img/temp/photos/teaser02.jpg');">
			<h3 class="footer-teaser-title">ROI calculator</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
			<p class="more"><a href="blog.php">ACS Blog</a></p>
		</article>
		<article class="col col3 footer-teaser" style="background-image: url('$ThemeDir/img/temp/photos/teaser03.jpg');">
			<h3 class="footer-teaser-title">Contact us</h3>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
			<p class="more"><a href="contact.php">Contact us</a></p>
		</article>
	</div>

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
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false'></script>
<!-- <script type="text/javascript" src="js/lib/jquery.js"></script>
<script type="text/javascript" src-"js/lib/underscore.js"></script>
<script type="text/javascript" src="js/lib/hammer.js"></script>
<script type="text/javascript" src="js/lib/hammer.jquery-plugin.js"></script>
<script type="text/javascript" src="js/scripts/navigated-slider.js"></script>
<script type="text/javascript" src="js/lib/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/lib/jquery-custom-content-scroller.js"></script>
<script type="text/javascript" src="js/scripts/double-slider.js"></script>
<script type="text/javascript" src="js/scripts/gallery-slider.js"></script>
<script type="text/javascript" src="js/scripts/utils.js"></script>
<script type="text/javascript" src="js/scripts/history.js"></script>
<script type="text/javascript" src="js/scripts/contact.js"></script>
<script type="text/javascript" src="js/scripts/fluid-videos.js"></script>
<script type="text/javascript" src="js/scripts/youtube.js"></script> -->
<script type="text/javascript" src="js/min.js"></script>
<!-- <script type="text/javascript" src="js/min.js"></script> 
<script type='text/javascript' src='js/lib/marker-with-label-packed.js'></script>-->
</body>
</html>