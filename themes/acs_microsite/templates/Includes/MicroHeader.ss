<header id="top" class="header cf">
	<section class="top cf">
		<p class="call">Call us: <a href="call:$SiteConfig.ContactNumber">$SiteConfig.ContactNumber</a></p>
		<nav class="sec-nav">
			<a class="menu-toggle" href="#"></a>
			<ul class="menu">
				<li><a href="/">Go to ACS365.co.uk</a></li>
			</ul>
		</nav>
		
	</section>
	<section class="main-header cf">
		<p class="logo">
			<a href="$MicroHolder.Link" title="$MicroHolder.Title.XML page">
				<img src="$SiteConfig.Logo.Link" alt="$SiteConfig.Logo.Title">
			</a>
		</p>

		<nav class="main-nav">
			<% if $MicrositePages %>
			<ul class="menu">
				<% loop $MicrositePages %>
					<li class="<% if $Children %>has-dropdown<% end_if %>">
						<a href="$Link" title="Go to $Title.XML">$MenuTitle.XML</a>
						<% if $Children %>
						<ul class="dropdown-menu">
							<% loop $Children %>
								<li><a href="$Link" title="Go to $Title.XML">$MenuTitle.XML</a></li>
							<% end_loop %>
						</ul>
						<% end_if %>
					</li>
				<% end_loop %>
			</ul>
			<% end_if %>
		</nav>
	</section>
</header>
