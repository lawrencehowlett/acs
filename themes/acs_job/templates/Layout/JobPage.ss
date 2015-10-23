<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section mt60">
	<div class="inside">
		<h2 class="section-title">Current opportunities</h2>

		<form class="content-search col col2" method="get" action="">
			<span class="field select">
				<span class="select-val"><% if $CurrentCategory %>$CurrentCategory.Title<% else %>All Categories<% end_if %></span>
				<select name="category" id="categories">
					<option value="all">All Categories</option>
					<% loop $Categories %>
						<option <% if $Top.CurrentCategory.ID == $ID %>selected="selected"<% end_if %> value="$URLSegment">$Title</option>
					<% end_loop %>
				</select>
			</span>
		</form>		

		<% if $Jobs %>
		<ul class="jobs">
			<% loop $Jobs %>
				<li class="job">
					<h3 class="job-title">$Title</h3>
					<ul class="job-data">
						<li class="place">$Location</li>
						<li class="salary">$Salary</li>
					</ul>

					<div style="width:80%;">
						$Summary
					</div>

					<p class="more">
						<a href="{$Top.Link}position/{$URLSegment}" title="Apply now">Apply now</a>
					</p>
				</li>
			<% end_loop %>
		</ul>
		<% else %>
			<% if $CurrentCategory %>
				<h2>No jobs found with category &lsquo;$CurrentCategory.Title&rsquo;</h2>
			<% else %>
				<h2>No jobs found</h2>
			<% end_if %>
		<% end_if %>
	</div>

	<% if $Jobs.MoreThanOnePage %>
		<br>
		<div class="pagination">
			<ul>
				 <% if $Jobs.NotFirstPage %>
					<li class="prev">
						<a href="{$Jobs.PrevLink}" title="Go to previous job posts">Prev </a>
					</li>
				<% end_if %>

				<% loop $Jobs.Pages %>
					<li <% if $CurrentBool %>class="active"<% end_if %>>
						<a href="$Link" title="Go to page $PageNum">$PageNum</a>
					</li>
				<% end_loop %>

				<% if $Jobs.NotLastPage %>
					<li class="next">
						<a href="{$Jobs.NextLink}" title="Go to next job posts">Next </a>
					</li>
				<% end_if %>
			</ul>
		</div>
	<% end_if %>

</section>