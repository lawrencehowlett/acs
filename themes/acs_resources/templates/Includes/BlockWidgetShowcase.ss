<div class="inside">
	<h2 class="section-title">$Title</h2>
</div>
<div class="viewport">
	<ul class="slider-navigation">
		<% loop $ShowcaseItems %>
		<li>
			<a href="javascript:void(0);" data-slide="$Pos" class="slide-link $ExtraClass <% if $First %>active<% end_if%>">$TabTitle</a>
		</li>
		<% end_loop %>
	</ul>
	<div class="slider-content">
		<% loop $ShowcaseItems %>
			<article class="slide">
				<div class="slide-background" data-image="$BackgroundImage.Link"></div>
				<div class="inside cf">
					<div class="slide-content">
						<% if $Image %>
							<img class="slide-image" src="$Image.Link" alt="$Image.Title">
						<% end_if %>

						<% if $RedirectPage %>
							<a href="$RedirectPage.Link" class="slide-button">$ButtonText</a>
						<% end_if %>

						<h3 class="slide-title">$Title</h3>
						$Content
					</div>
				</div>
			</article>
		<% end_loop %>
	</div>
</div>	