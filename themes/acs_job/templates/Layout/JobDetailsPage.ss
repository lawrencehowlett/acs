<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">

		<h1 class="page-title">
			<% if $JobDetails %>
				$JobDetails.Title
			<% else %>
				$Title
			<% end_if %>
		</h1>

		<% if $JobDetails %>
			<% if $JobDetails.Salary %>
				<li>Salary <a href="javascript:void(0);" title="Salary">$JobDetails.Salary</a></li>
			<% end_if %>

			<% if $JobDetails.Location %>
				<li>Location <a href="javascript:void(0);" title="Location">$JobDetails.Location</a></li>
			<% end_if %>
		<% else %>
			$Description
		<% end_if %>
	</div>
</section>

<section class="page-section text-content">
	<div class="inside cf">
		<article class="reading cs-content job-details">
			$JobDetails.Content
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
						<% if $JobDetails.StartDate %>
							<tr>
								<td style="padding-left:0;"><strong>Job Start Date:</strong></td>
								<td>$JobDetails.StartDate.Long</td>
							</tr>
						<% end_if %>
						<% if $JobDetails.EndDate %>
							<tr>
								<td style="padding-left:0;"><strong>Job End Date:</strong></td>
								<td>$JobDetails.EndDate.Long</td>
							</tr>
						<% end_if %>

					</tbody>
				</table>
			</div>
		</article>

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

<section class="page-section shade contact last-section">
	<div class="inside">
		<div class="cols separated">
			<div class="col col2 contact-content">
				<h2>Apply Now</h2>
				<p>To apply for this job, please complete the form.</p>
				<p>One of our recruitment consultants will be in touch.</p>
			</div>		
			$JobApplicationForm
		</div>
	</div>
</section>
