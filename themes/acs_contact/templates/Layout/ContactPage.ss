<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section shade contact">
	<div class="inside">
		<div class="cols separated">
			<div class="col col2 contact-content">
				<% if not $Success %>
					$Content
				<% else %>
					$SubmitText
				<% end_if %>

				<p class="contact-data">
					<% if $TelephoneNumber %>
						<strong>call:</strong> $TelephoneNumber<br>
					<% end_if %>

					<% if $FaxNumber %>
						<strong>fax:</strong> $FaxNumber<br>
					<% end_if %>

					<% if $EmailAddress %>
						<strong>email:</strong> <a href="mailto:$EmailAddress">$EmailAddress</a>
					<% end_if %>
				</p>
			</div>
			<% if not $Success %>
				$ContactForm
			<% end_if %>
		</div>
	</div>
</section>

<% if $RegionalOffices %>
<section class="page-section address-section last-section">
	<div class="inside">
		<h2>Or pop in and see us</h2>
		<div class="address-box slider">
			<a href="javascript:void(0);" class="slider-nav prev">previous</a>
			<a href="javascript:void(0);" class="slider-nav next">next</a>
			<ul class="slider-content">
				<% loop $RegionalOffices %>
					<li class="address slider-item" data-lat="$GoogleMapLat" data-lng="$GoogleMapLong">
						<h3 class="address-title">$Title</h3>
						$Content
					</li>
				<% end_loop %>
			</ul>
		</div>
		<div class="address-slider slider" data-ipp="2">
			<a href="javascript:void(0);" class="slider-nav prev">Back</a>
			<a href="javascript:void(0);" class="slider-nav next">Forward</a>
			<ul class="slider-content">
				<% loop $RegionalOffices %>
					<li class="slider-item">
						<h4 class="slide-title">$Title</h4>
						<p><a href="javascript:void(0);" data-slide="$Top.getListIndex($Pos)" class="find-location">show more</a></p>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
	<div class="map-holder">
		<div class="map" id="gmap" data-markers='[
		<% loop $RegionalOffices %>
			<% if $GoogleMapLat && $GoogleMapLong %>
				{"text": "$Title", "lat": $GoogleMapLat, "lng": $GoogleMapLong}<% if not $Last %>,<% end_if %>
			<% end_if %>
		<% end_loop %>
		]' data-centerlat="$RegionalOffices.First.GoogleMapLat" data-centerlng="$RegionalOffices.First.GoogleMapLong" data-marker="$ThemeDir/img/marker.png"></div>
	</div>
	
</section>
<% end_if %>