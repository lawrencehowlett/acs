<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section text-content">
	<div class="inside cf">
		<article class="reading cs-content">
			<p class="lead">Sonangol enlisted our help to redesign their current Knightsbridge office in order to create a brand new, blue chip corporate London HQ.</p>
			<p>We achieved this by integrating three existing buildings on the Brompton Road into one - interconnecting all of the spaces with a stunning architectural masterpiece in stainless steel and glass to create a staircase.</p>
			<p>We carried out full workplace consultancy to truly understand Sonangol needs for today and for their future.</p>
			<p>Our overall design concept was created to reflect their heritage and their progressive future as a leading oil producer in Africa.</p>
			<p>In order to carry out the work, we refurbished all three buildings whilst Sonangol were in occupancy – which is a particular skill which we have within Peldon Rose. Our client remained working without any disruption throughout the construction process. And each member of staff only moved desks once.</p>
			<p>Not only this, but we created a luxurious reception area that previously didn’t exist alongside a new front of shop on Brompton Road. All in all providing a quality of service to their clients. As you enter reception, a stainless steel and glass staircase sweeps up to their first floor boardroom, holding 24 people, with a gracious outlook onto Knightsbridge.</p>
			<p>On the fourth floor, we created an exceptionally lavish executive suite for the CEO, which included breakout spaces, a gym and shower facilities.</p>
			<p>We reused their existing Bene products, upcycling them with white tops, as they were only two years old. Our furniture team also installed every iconic design classic you could think of into Sonangol’s new workspace, with brands such as Eileen Gray, Walter Knoll and Vitra. The boardroom table was hand made by Hands of Wycombe.</p>

			<h2>$GalleryImagesTitle</h2>
			<p class="all">
				<a href="$GalleryImagesRedirectPage.Link" title="$GalleryImagesRedirectPage.Title">See all projects</a>
			</p>
			<ul class="gallery cols separated">
				<% loop $GalleryImages %>
					<li class="col col2">
						<a href="$Link" class="image">
							<img src="$PaddedImage(400, 300).Link">
						</a>
					</li>
				<% end_loop %>
			</ul>
			<div class="social-share">
				<img src="img/temp/social/fb1.png" alt=""> <img src="img/temp/social/fb2.png" alt=""> <img src="img/temp/social/google.png" alt=""> <img src="img/temp/social/twitter.png" alt=""> <img src="img/temp/social/linkedin.png" alt="">
			</div>
		</article>
		<aside class="cs-sidebar">
			<% if $Features %>
				<% loop $Features %>
					<div class="cs-feature">
						<div class="inside">
							<p class="img">
								<img src="$Icon.Link" alt="$Icon.Title">
							</p>
							<h4 class="feature-title">$Title</h4>
							<p class="feature-data">$Description</p>
						</div>
					</div>
				<% end_loop %>
			<% end_if %>
		</aside>
	</div>
</section>

<% include FeaturedResources %>