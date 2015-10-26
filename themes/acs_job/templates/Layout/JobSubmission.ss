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
			<br>
			<ul class="post-meta">
			<% if $JobDetails.Salary %>
				<li>Salary <a href="javascript:void(0);" title="Salary">$JobDetails.Salary</a></li>
			<% end_if %>

			<% if $JobDetails.Location %>
				<li>Location <a href="javascript:void(0);" title="Location">$JobDetails.Location</a></li>
			<% end_if %>
			</ul>
		<% else %>
			$Description
		<% end_if %>
	</div>
</section>

<section class="page-section intro-text mt60 cf">
	<div class="inside">
		$SubmitText
	</div>
</section>