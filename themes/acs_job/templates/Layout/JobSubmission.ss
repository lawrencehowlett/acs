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
			<p>$JobDetails.Summary</p>
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