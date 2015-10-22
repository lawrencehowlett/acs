<section class="page-section page-header" style='<% if $JobListingPage.Banner %>background-image: url("$JobListingPage.Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$JobListingPage.Title</h1>
		$JobListingPage.Description
	</div>
</section>


<section class="page-section text-content blog">
	<div class="inside cf">
		<section class="blog-main" style="padding-left:0;">
			<article class="blog-content reading">
				<h2>$JobDetails.Title</h2>
				<div class="table">
					<table>
						<tbody>
							<tr>
								<td style="padding-left:0;"><strong>Salary:</strong></td>
								<td>$JobDetails.Salary</td>
							</tr>
							<tr>
								<td style="padding-left:0;"><strong>Location:</strong></td>
								<td>$JobDetails.Location</td>
							</tr>
							<tr>
								<td style="padding-left:0;"><strong>Job ref:</strong></td>
								<td>$JobDetails.ConsultantReference</td>
							</tr>
						</tbody>
					</table>
				</div>
				<h4>Description</h4>
				$JobDetails.Content
			</article>	
		</section>	

		<aside class="blog-sidebar">
			<div class="widget">
				<h3 class="widget-title">Categories</h3>
				<ul class="side-menu">
					<% loop $Categories %>
						<li>
							<a href="$Top.JobListingPage.Link/category/$URLSegment" class="$Top.IsCurrentCategory($ID)">$Title</a>
						</li>
					<% end_loop %>
				</ul>
			</div>

			<% if $FeaturedJobs %>
				<div class="widget featured">
					<h3 class="widget-title">Featured jobs</h3>
					<div class="widget-inner">
						<ul class="post-list text" style="padding-top:0;">
							<% loop $FeaturedJobs %>
								<li style="padding-top:0;">
									<h3><a href="$Top.URLSegment/$URLSegment">$Title</a></h3>
								</li>
							<% end_loop %>
						</ul>
					</div>
				</div>		
			<% end_if %>			
		</aside>

	</div>
</section>

<section class="page-section shade contact last-section">
	<div class="inside">
		<div class="cols separated">
			<div class="col col2 contact-content">
				<h2>Apply Now</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquastorul. Dorunasto ipsum dolor sit amet, consectetur adipisicing elit.</p>
			</div>
			$JobApplicationForm
		</div>
	</div>
</section>