<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetSimpleImage' %>
				<div class="inside">
					<article class="specialist-box cf">
						<div class="specialist-img">
							<img src="$Image.Link" alt="$Image.Title">
						</div>
						<div class="specialist-text">
							<h2 class="specialist-title">$Title</h2>
							$Content
						</div>
					</article>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetActionBox' %>
				<div class="inside">
					<div class="cols cta-boxes">
						<% loop $Items %>
							<article class="cta-box box$Pos col col3 clickable">
								<p class="cta-box-img">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">
										<img src="$Image.Link" alt="$Image.Title">
									</a>
								</p>
								<h3 class="cta-box-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$Title</a>
								</h3>
								$Content
							</article>
						<% end_loop %>
					</div>
				</div>			
			<% end_if %>

		</section>

	<% end_loop %>
<% end_if %>