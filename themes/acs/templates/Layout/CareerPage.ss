<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass" <% if $BackgroundImage %>style="background-image: url('$BackgroundImage.Link')"<% end_if %>>

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					<% if $Layout == 'Standard' %>
						<% if $Title %><h2 class="section-title">$Title</h2><% end_if %>
						<% if $Tagline %><p class="lead">$Tagline</p><% end_if %>
						$Content

						<% if $RedirectPage %>
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>
						<% end_if %>

					<% else %>
						<header class="text-section-header">

							<% if $Title %>
								<h2 class="section-title">$Title</h2>
							<% end_if %>
							
							<% if $Tagline %>
								<p class="lead">$Tagline</p>
							<% end_if %>

						</header>
						<div class="text-section-content">
							$Content
							<% if $RedirectPage %>
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
								</p>
							<% end_if %>
						</div>
					<% end_if %>
				</article>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetGallery' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>

				<% if $Images %>
					<div class="gallery-slider">
						<a href="javascript:void(0);" class="slider-nav prev"></a>
						<a href="javascript:void(0);" class="slider-nav next"></a>
						<div class="slider-wrapper">
							<ul class="gallery-slider-items">
								<% loop $Images %>
									<li>
										<a href="$Image.Link" class="image">
											<img src="$Image.SetRatioSize(580, 400).Link" alt="$Image.Title">
										</a>
									</li>
								<% end_loop %>
							</ul>
						</div>
					</div>
				<% end_if %>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetBatchIconSlider' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<ul class="logo-slider">
						<% loop $Icons %>
							<li>
								<img src="$Image.Link" alt="$Image.Title">
							</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>			

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

			<% if $ClassName == 'BlockWidgetImage' %>	
				<div class="inside">
					<div class="media cf">
						<h2 class="section-title">$Title</h2>
						<div class="media-content <% if $Position == 'Right' %>media-right<% end_if %>">
							<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">
						</div>
						<div class="media-description <% if $Position == 'Right' %>media-left<% end_if %>">
							$Content
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>							
						</div>
					</div>
				</div>
			<% end_if %>			

			<% if $ClassName == 'BlockWidgetVideo' %>
				<% if $BackgroundImage || $Tagline %>
					<div class="inside cf">
						<div class="video-text">
							<h2 class="section-title">$Title</h2>
							<p class="lead">$Tagline</p>
							$Content
							<% if $RedirectPage.Link %>
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
								</p>
							<% end_if %>

						</div>
						<div class="video-movie">
							<div class="video-placeholder">
								<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">

								<% if $VideoURL %>
									<a href="$VideoURL" class="html5lightbox play"></a>
								<% end_if %>
							</div>
						</div>
					</div>
				<% else %>
					<div class="inside">
						<div class="media cf">
							<h2 class="section-title">$Title</h2>
							<div class="media-content">
								<div class="video-movie">
									<div class="video-placeholder">
										<img src="$Image.CroppedImage(586, 392).Link" alt="$Image.Title">

										<% if $VideoURL %>
											<a href="$VideoURL" class="html5lightbox play"></a>
										<% end_if %>
									</div>
								</div>
							</div>
							<div class="media-description">
								$Content
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
								</p>							
							</div>
						</div>
					</div>
				<% end_if %>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetTab' %>
				<div class="inside tab-section">
					<h2 class="section-title">$Title</h2>
					<% if $Items %>
						<ul class="tabs" data-target="resourceList">
							<% loop $Items %>
								<li class="tab">
									<a href="#tab{$ID}" class="<% if $First %>active<% end_if %>" data-criteria="tab{$ID}">$Title</a>
								</li>
							<% end_loop %>
						</ul>
						<% loop $Items %>
							<div class="tab-content <% if $First %>active<% end_if %>" id="tab{$ID}">
								$Content
								<% if $RedirectPage %>
									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
									</p>
								<% end_if %>
							</div>
						<% end_loop %>
					<% end_if %>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSlider' %>
				<div class="inside relative testimonial-slider">
					<h2 class="section-title">$Title</h2>
					<div class="testimonials">
						<% loop $Items %>
							<article class="testimonial">
								<div class="testimonial-image">
									<% if $Image %>
										<img src="$Image.Link" alt="$Image.Title">
									<% end_if %>
								</div>
								<div class="testimonial-text">
									<h3 class="author-name">$Title</h3>
									<% if $Tagline %>
										<p class="author-position">$Tagline</p>
									<% end_if %>
									$Content
								</div>
							</article>
						<% end_loop %>
					</div>
					<div class="testimonial-nav">
						<a href="javascript:void(0);" class="prev"></a>
						<a href="javascript:void(0);" class="next"></a>
					</div>
				</div>	
			<% end_if %>

			<% if $ClassName == 'BlockWidgetActionBox' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="cols cta-boxes">
						<% loop $Items %>
							<article class="cta-box box$Pos col col3 clickable">
								<p class="cta-box-img">
									<a href="<% if $StartLiveChat %>javascript:void(0);<% else_if $RedirectPage %>$RedirectPage.Link<% else %>javascript:void(0);<% end_if %>" <% if $StartLiveChat %>class="livechat"<% end_if %> title="Go to $RedirectPage.Title">
										<img src="$Image.Link" alt="$Image.Title">
									</a>
								</p>
								<h3 class="cta-box-title">
									<a href="<% if $StartLiveChat %>javascript:void(0);<% else_if $RedirectPage %>$RedirectPage.Link<% else %>javascript:void(0);<% end_if %>" <% if $StartLiveChat %>class="livechat"<% end_if %> title="Go to $RedirectPage.Title">$Title</a>
								</h3>
								$Content
							</article>
						<% end_loop %>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetTwoColumnActionBox' %>
				<div class="inside">
					<div class="cols item-boxes">
						<% loop $TwoColumnActionBoxItems %>
							<article class="item-box col col2">
								<% if $Image %>
									<div class="item-img">
										<img src="$Image.Link" alt="$Image.Title">
									</div>
								<% end_if %>
								<h3 class="item-title">$Title</h3>
								$Content
								<% if $RedirectPage %>
									<p class="more">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">More info</a>
									</p>
								<% end_if %>
							</article>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSpeakToSpecialist' %>
				<% if $ActionBoxRedirectPageID %>
					<div class="brochure cf" style="background: rgba(0, 0, 0, 0) url('$ActionBoxBackgroundImage.Link') no-repeat scroll 100% 0">
						<div class="brochure-content">
							<p class="section-title">$ActionBoxTitle</p>
							<div class="brochure-text">
								<h2 class="brochure-title">$ActionBoxTagline</h2>
								$ActionBoxContent
							</div>
							<p class="download">
								<a href="$ActionBoxRedirectPage.Link" title="Go to $ActionBoxRedirectPage.Title" class="wire-button">$ActionBoxButtonText</a>
							</p>
						</div>
					</div>
				<% else %>
					<div class="decoration" style="background: rgba(0, 0, 0, 0) url('$FeaturedImage.Link') no-repeat scroll 100% 0;"></div>
				<% end_if %>
				$Top.SpecialistsForm
			<% end_if %>

			<% if $ClassName == 'BlockWidgetTable' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<div class="table">
						<table>
							<% if $Rows %>
								<% loop $Rows %>
									<tr>
										<% loop $Columns %>
											<% if $Up.IsHeading %>
												<th>$Title</th>
											<% else %>
												<td>$Title</td>
											<% end_if %>
										<% end_loop %>
									</tr>
								<% end_loop %>
							<% end_if %>
						</table>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetResources' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<% if $Top.AllResourcesPage %>
						<p class="all">
							<a href="$Top.AllResourcesPage.Link" title="Go to $Top.AllResourcesPage.Title">View all resources</a>
						</p>
					<% end_if %>
				</div>

				<div class="res-slider double-slider inside">
					<a href="javascript:void(0);" class="slider-nav next">Next</a>
					<a href="javascript:void(0);" class="slider-nav prev">Previous</a>
					<div class="slider-wrapper">
						<div class="slider-items">
							<% loop $Resources %>
								<div class="slide">
									<div class="resource slider-item">
										<img src="$FeaturedImage.CroppedImage(220, 300).Link" alt="$FeaturedImage.Title" class="resource-thumbnail">
										<h3 class="resource-title">$Title</h3>
										$Content

										<% if $DocumentType %>
											<p class="resource-category">
												<a href="javascript:void(0);">$DocumentType.Title</a>
											</p>
										<% end_if %>

										<% if $RedirectPage %>
											<p class="more">
												<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title page">More info</a>
											</p>
										<% end_if %>

									</div>
								</div>
							<% end_loop %>
						</div>
					</div>
				</div>				
			<% end_if %>

			<% if $ClassName == 'BlockWidgetWork' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
					<ul class="work">
						<% loop $Works %>
						<li class="work-item $ExtraClass">
							<p class="number">$Pos</p>
							<div class="work-item-img">
								<div class="img">
									<% if $TabIcon %>
										<img src="$TabIcon.Link" alt="$TabIcon.Title">
									<% end_if %>
								</div>
							</div>
							<h3 class="work-title">$Title</h3>
							$Content

							<% if $RedirectPage %>
								<p class="more">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.TItle">$ButtonText</a>
								</p>
							<% end_if %>

						</li>
						<% end_loop %>
					</ul>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetProjects' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="featured-slider double-slider inside">
				<a href="javascript:void(0);" class="slider-nav next">Next</a>
				<a href="javascript:void(0);" class="slider-nav prev">Previous</a>

					<div class="slider-wrapper">
						<div class="slider-items">
							<% loop $Projects %>
								<div class="slide">
									<div class="featured-project slider-item">
										<a href="<% if $RedirectPage %>$RedirectPage.Link<% else %>javascript:void(0);<% end_if %>">
											<img src="$RedirectPage.FeaturedImages.First.CroppedImage(570, 375).Link" alt="$RedirectPage.FeaturedImages.First.Link" class="project-thumbnail">
										</a>
										<h3 class="project-title">$Title</h3>

										<% if $RedirectPage.Categories %>
										<p class="project-cat"><% loop $RedirectPage.Categories %><a href="javascript:void(0);">$Title</a><% if not $Last %>, <% end_if %><% end_loop %></p>
										<% end_if %>
										
										<% if $RedirectPage %><p class="more"><a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">More info</a></p><% end_if %>

									</div>
								</div>
							<% end_loop %>
						</div>
					</div>
				</div>			
			<% end_if %>

			<% if $ClassName == 'BlockWidgetCaseStudies' %>
				<ul class="slider-navigation">
					<% loop $CaseStudies %>
					<li>
						<a href="javascript:void(0);" class="slide-link <% if $First %>active<% end_if %>" data-slide="$Top.getListIndex($Pos)">
							<img src="$Icon.Link" alt="$Icon.Title">
						</a>
					</li>
					<% end_loop %>
				</ul>
				<div class="viewport">
					<div class="slider-content">
						<% loop $CaseStudies %>
							<article class="slide">
								<div class="cs-slide-bg slide-background" data-image="$Image.Link"></div>
								<div class="inside">
									<div class="slide-content cf">
										<h2 class="section-title">$Title</h2>	
										$Content

										<% if $RedirectPage %>
											<p class="more">
												<a href="$RedirectPage.Link">$ButtonText</a>
											</p>
										<% end_if %>
									</div>
								</div>
							</article>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetSpinningBanner' %>
				<ul class="slider-navigation">
					<% loop $SpinningBanners %>
						<li>
							<a href="javascript:void(0);" class="slide-link $ExtraClass <% if $First %>active<% end_if %>" data-slide="$Top.getListIndex($Pos)">$Title</a>
						</li>
					<% end_loop %>
				</ul>
				<div class="viewport">
					<div class="slider-content">
						<% loop $SpinningBanners %>
							<div class="slide">
								<div class="header-slide-bg slide-background" data-image="$Image.Link"></div>
								<div class="inside slide-content">
									$Content
									<% if $RedirectPage %>
										<p class="more">
											<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
										</p>
									<% end_if %>
								</div>
							</div>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetShowcase' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="viewport">
					<ul class="slider-navigation">
						<% loop $ShowcaseItems %>
						<li>
							<% if $TabIcon %>
								<div class="img">
									<img alt="$TabIcon.Title" src="$TabIcon.link">
								</div>
							<% end_if %>
							<a href="javascript:void(0);" data-slide="$Top.getListIndex($Pos)" class="slide-link $ExtraClass <% if $First %>active<% end_if%>">$TabTitle</a>
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
			<% end_if %>

			<% if $ClassName == 'BlockWidgetMultipleTextImageBlock' %>
				<div class="inside teaser-list">
					<% loop $TextImageBlocks %>
						<article class="article-teaser">

							<div class="article-teaser-img">
								<img src="$Image.Link" alt="$Image.Title">
							</div>

							<div class="article-teaser-text">
								<h3 class="article-teaser-title">
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML page">$Title</a>
								</h3>
								$Content
							</div>

						</article>
					<% end_loop %>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetDoubleSlider' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="inside about-slider double-slider">
					<a href="javascript:void(0);" class="slider-nav prev"></a>
					<a href="javascript:void(0);" class="slider-nav next"></a>
					<div class="slider-wrapper">
						<div class="slider-items">
							<% loop $DoubleSliderItems %>
								<div class="slide">
									<div class="slider-item">
										<h3 class="slide-title">
											<a href="<% if $RedirectPage %>$RedirectPage.Link<% else %>javascript:void(0);<% end_if %>" title="Go to $RedirectPage.Title.XML">$Title</a>
										</h3>
										<p class="slide-img">
											<a href="<% if $RedirectPage %>$RedirectPage.Link<% else %>javascript:void(0);<% end_if %>">
												<img src="$Image.Link" alt="$Image.Title">
											</a>
										</p>
									</div>
								</div>
							<% end_loop %>
						</div>
					</div>
				</div>	
			<% end_if %>	

			<% if $ClassName == 'BlockWidgetTeam' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>
				</div>
				<div class="team-slider inside">
					<a href="javascript:void(0);" class="slider-nav next">Next</a>
					<a href="javascript:void(0);" class="slider-nav prev">Previous</a>
					<div class="team slider-wrapper">
						<div class="slider-items">
							<% loop $Members %>
								<div class="slide">
									<div class="member">
										<p class="member-photo">
											<a href="javascript:void(0);" title="$Title">
												<img src="$Image.Link" alt="$Image.Title">
											</a>
										</p>
										<p class="member-name"><strong>$Title</strong><br>$Position</p>
									</div>
								</div>
							<% end_loop %>
						</div>
					</div>
				</div>				
			<% end_if %>

			<% if $ClassName == 'AboutStory' %>
				<div class="inside">
					<h2 class="section-title">$Title</h2>

					<section class="history">
						<section class="slider">
							<p class="slider-controls">
								<a href="javascript:void(0);" class="prev" title="Slide back">Slide back</a>
								<a href="javascript:void(0);" class="next" title="Slide forward">Slide forward</a>
							</p>
							<div class="timeline mCustomScrollbar" data-mcs-axis="x" data-mcs-theme="dark-3">
								<div class="box">

									<ul class="months cf">
										<% loop $TimeLine %>
											<li class="month <% if $HasRecord %>full<% end_if %>" data-month="$DataMonth">
												<span class="label">$Month<% if $StartOfYear %><br>
												<span class="year">$Year</span><% end_if %></span>
											</li>
										<% end_loop %>
									</ul>

								</div>
							</div>
							<div class="slider-content">
								<% loop $Entries %>
									<article class="slider-item" data-day="$Date.Format('d')" data-month="$Date.Format('m')" data-year="$Date.Format('Y')">
										<p class="img">
											<img src="$Image.Link" alt="$Image.Title">
										</p>
										<div class="slide-content">
											<p class="slide-date"><span class="year">$Date.Format('Y')</span><br>$Date.Format('d') $Date.Format('M')</p>
											<h3 class="slide-title"><a href="javascript:voide(0);">$Title</a></h3>
											$Content
										</div>
									</article>
								<% end_loop %>
							</div>
						</section>
					</section>
				</div>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetScrollingNumbers' %>
				<% if $Items %>
				<div class="inside">
					<div class="cols numbers">
						<% loop $Items %>
							<div class="number-box col col4">
								<p class="number-img">
									<% if $Image %>
										<img src="$Image.Link" width="57" height="77" alt="$Image.Title">
									<% end_if %>
								</p>
								<p class="number" data-value="$Value" data-decimal="$Decimal" data-suffix=" $Suffix">$Value</p>
								$Content
							</div>
						<% end_loop %>
					</div>
				</div>
				<% end_if %>
			<% end_if %>

			<% if $ClassName == 'BlockWidgetPriceTable' %>
				<div class="inside">
					<div class="cols separated tight pricing">
						<% loop $PricingTables %>
							<div class="pricing-plan col col3">
								<img src="$FeaturedImage.Link" alt="$FeaturedImage.Title">
								<h3 class="plan-title">$Title</h3>
								<p class="plan-price">$Price</p>
								<p class="plan-descr">$Description</p>
								
								<% if $Features %>
									<ul class="plan-features">
										<% loop $Features %>
											<li>$Title</li>
										<% end_loop %>
									</ul>
								<% end_if %>

								<% if $RedirectPage %>
									<p class="plan-buy">
										<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML">$ButtonText</a>
									</p>
								<% end_if %>
							</div>
						<% end_loop %>
					</div>
				</div>
			<% end_if %>	

			<% if $ClassName == 'BlockWidgetMap' %>
				<div class="inside">
					<h2>$Title</h2>
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
			<% end_if %>

			<% if $ClassName == 'BlockWidgetAccordion' %>
				<div class="inside">
					<div class="accordions">
						<% loop $Items %>
						<div class="accordion">
							<div class="accordion-title">$Title</div>
							<div class="content">
								<div class="accordian-content">$Content</div>     
							</div>
						</div>
						<% end_loop %>
					</div>  
				</div>
			<% end_if %>

		</section>	

	<% end_loop %>
<% end_if %>

<section class="page-section mt60">
	<div class="inside">
		<h2 class="section-title">$CareerOpportunityTitle</h2>
		<% if $CareerOpportunities %>
		<ul class="jobs">
			<% loop $CareerOpportunities %>
				<li class="job">
					<h3 class="job-title">$Title</h3>
					<ul class="job-data">
						<% if $Location %>
							<li class="place">$Location</li>
						<% end_if %>
						<% if $Offer %>
							<li class="salary">$Offer</li>
						<% end_if %>
					</ul>
					<% if $Requirements %>
					<ul class="requirements">
						<% loop $Requirements %>
							<li>$Title</li>
						<% end_loop %>
					</ul>
					<% end_if %>
					<p class="more"><a href="mailto:$Top.CareerOpportunityMailTo?subject=Referred via our website for $Title position" title="Send your CV to $Top.CareerOpportunityMailTo">$ButtonText</a></p>
				</li>
			<% end_loop %>
		</ul>
		<% end_if %>
	</div>
</section>
