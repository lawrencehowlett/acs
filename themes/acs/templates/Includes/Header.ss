<header id="top" class="header cf">
	<section class="top cf">
		<p class="call">Call us: <a href="call:$SiteConfig.FullContactNumber">$SiteConfig.ContactNumber</a></p>
		
		$SearchForm
		<% if $TopMenus %>
			<nav class="sec-nav">
				<a class="menu-toggle" href="javascript:void(0);"></a>
				<ul class="menu">
					<% loop $TopMenus %>
						<li class="<% if $Children %>has-dropdown<% end_if %>">
							<a href="$Link" title="Go to $Title.XML page">$MenuTitle.XML</a>
							<% if $Children %>
								<ul class="dropdown-menu">
									<% loop $Children %>
									<li><a href="$Link" title="Go to $Title.XML">$MenuTitle.XMl</a></li>
									<% end_loop %>
								</ul>					
							<% end_if %>
						</li>
					<% end_loop %>
					</li>
				</ul>
			</nav>
		<% end_if %>
		
	</section>

	<section class="main-header cf">
		<p class="logo">
			<a href="/" title="ACS">
				<img src="$SiteConfig.Logo.Link" alt="$SiteConfig.Logo.Title">
			</a>
		</p>

		<nav class="main-nav">
			<% if $Menu(1) %>
				<ul class="menu">
					<% loop $Menu(1) %>
						<li class="<% if $Children %>has-dropdown<% end_if %>">
							<a href="$Link" title="Go to $Title.XML">$MenuTitle.XML</a>
							<% if $Children %>
								<ul class="dropdown-menu">
									<li><a href="$Link" title="Go to $Title.XML">$MenuTitle.XML</a></li>
								</ul>
							<% end_if %>
						</li>
					<% end_loop %>
				</ul>
			<% end_if %>
		</nav>		

	</section>
</header>