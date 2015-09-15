<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Partners %>
	<section class="page-section mt60">
		<div class="inside">
			<ul class="accreditations">
				<% loop $Partners %>
					<li class="acc">
						<p class="acc-logo"><img src="$FeaturedImage.Link" alt="$FeaturedImage.Title"></p>
						<div class="acc-content">
							$Content
							<% if $RedirectPage %>
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML">$ButtonText</a>
								</p>
							<% end_if %>
						</div>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</section>
<% end_if %>