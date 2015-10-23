<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
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
							<% if $JobDetails.Salary %>
								<tr>
									<td style="padding-left:0;"><strong>Salary:</strong></td>
									<td>$JobDetails.Salary</td>
								</tr>
							<% end_if %>

							<% if $JobDetails.Location %>
								<tr>
									<td style="padding-left:0;"><strong>Location:</strong></td>
									<td>$JobDetails.Location</td>
								</tr>
							<% end_if %>

							<% if $JobDetails.ConsultantReference %>
								<tr>
									<td style="padding-left:0;"><strong>Job ref:</strong></td>
									<td>$JobDetails.ConsultantReference</td>
								</tr>
							<% end_if %>

						</tbody>
					</table>
				</div>
				<h4>Description</h4>
				$JobDetails.Content

				<section class="page-section contact last-section">
					<div class="inside">
						<h2 class="section-title">Apply Now</h2>
						<div class="cols separated">
							$JobApplicationForm
						</div>
					</div>
				</section>
			</article>
		</section>	

		<aside class="blog-sidebar">
			<div class="widget">
				<h3 class="widget-title">Categories</h3>
				<ul class="side-menu">
					<% loop $Categories %>
						<li>
							<a href="${Link}category/$URLSegment" class="$Top.IsCurrentCategory($ID)">$Title</a>
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
								<li style="<% if $First %>padding-top:0;<% end_if %> <% if not $Last %>border-bottom: 1px solid #ddd;<% end_if %> min-height:50px;">
									<a href="$Top.URLSegment/$URLSegment">$Title</a><br>
									$Location
								</li>
							<% end_loop %>
						</ul>
					</div>
				</div>		
			<% end_if %>			
		</aside>

	</div>
</section>