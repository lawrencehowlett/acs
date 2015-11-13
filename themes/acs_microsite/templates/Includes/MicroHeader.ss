<header id="top" class="header cf">
	<section class="top cf">
		<p class="call">
			Call us: 
			<a href="call:<% if $ClassName == 'MicroPage' || $ClassName == 'JobPage' %>$MicroHolder.Telephone<% else %>$Telephone<% end_if %>">
				<% if $ClassName == 'MicroPage' || $ClassName == 'JobPage' %>$MicroHolder.Telephone<% else %>$Telephone<% end_if %>
			</a>
		</p>
		$SearchForm
		<nav class="sec-nav">
			<a class="menu-toggle" href="javascript:void(0);"></a>
			<ul class="menu">
				<li><a href="/">Go to ACS365.co.uk</a></li>
			</ul>
		</nav>
		
	</section>
	<section class="main-header cf">
		<p class="logo" <% if $ClassName == 'JobPage' %>style="width:163px;"<% end_if %>>
			<a href="$MicroHolder.Link" title="$MicroHolder.Title.XML page">
				<% if $ClassName == 'JobPage' %>
					<img src="$ThemeDir/img/recruitment_logo.png" alt="ACS365 Recruitment logo" style="width:auto; max-width:none;">
				<% else %>
					<img src="$SiteConfig.Logo.Link" alt="$SiteConfig.Logo.Title">
				<% end_if %>
			</a>
		</p>

		<% if $MicroHolder.Logo || $Logo %>
		<p class="logo" style="width: auto;">
			<img src="<% if $ClassName == 'MicroPage' || $ClassName == 'JobPage' %>$MicroHolder.Logo.Link<% else %>$Logo.Link<% end_if %>" alt="<% if $ClassName == 'MicroPage' || $ClassName == 'JobPage' %>$MicroHolder.Logo.Title<% else %>$Logo.Title<% end_if %>">
		</p>
		<% end_if %>

		<nav class="main-nav" style="width: auto;">
			<% if $MicroMenus %>
				<ul class="menu">
					<% loop $MicroMenus %>
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
