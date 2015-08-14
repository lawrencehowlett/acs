<header id="top" class="header cf">
	<section class="top cf">
		<p class="call">Call us: <a href="call:$SiteConfig.FullContactNumber">$SiteConfig.ContactNumber</a></p>
		
		<form class="searchform" action="#" method="post">
			<p class="search-content"><a href="#" class="search-toggle" title="Show/hide search form"></a><input type="text" name="criteria" placeholder="Search">
				<button name="Search" value="1" type="submit">Search</button>
			</p>
		</form>

		<% if $TopMenus %>
			<nav class="sec-nav">
				<a class="menu-toggle" href="#"></a>
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
			<a href="home.php" title="ACS">
				<img src="$SiteConfig.Logo.Link" alt="$SiteConfig.Logo.Title">
			</a>
		</p>

		<% if $Menu(1) %>
			<nav class="main-nav">
				<ul class="menu">
					<% loop $Menu(1) %>
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
				</ul>
			</nav>
		<% end_if %>

	</section>
</header>