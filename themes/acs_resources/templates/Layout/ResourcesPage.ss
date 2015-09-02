<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<section class="page-section resources-section">
	<div class="inside">
		<div class="cols separated tight controls">
			<ul class="filters tabs col col2" data-target="resourceList">
				<li class="tab">
					<a href="javascript:void(0);" class="filter active" data-criteria="">All</a>
				</li>
				<% loop $Categories %>
					<li class="tab">
						<a href="javascript:void(0);" class="filter" data-criteria="$CodeIdentifier">$Title</a>
					</li>
				<% end_loop %>
			</ul>
			<form class="content-search col col2" method="get" action="">
				<span class="field select">
					<span class="select-val">Filter by document type</span>
					<select name="doc-type">
						<option value="0">All</option>
						<% loop $DocumentTypes %>
							<option value="$ID">$Title</option>
						<% end_loop %>
					</select>
				</span>
				<label class="field searchbox">
					<input type="text" name="phrase" placeholder="Search..."> <button type="submit" name="search" value="1">Search</button></span>
				</label>
			</form>
		</div>

		<ul class="res-list cols" id="resourceList">
			<% loop $PaginatedList %>
				<li class="resource col col2 <% if $Categories %><% loop $Categories %> $CodeIdentifier<% end_loop %><% end_if %>">
					<img src="$FeaturedImage.CroppedImage(220, 300).Link" alt="$FeaturedImage.Title" class="resource-thumbnail">

					<h3 class="resource-title">$Title.XML</h3>

					<% if $Summary %>$Summary<% else %>$Excerpt<% end_if %>

					<% if $DocumentTypes %>
					<p class="resource-category">
						<% loop $DocumentTypes %><a href="javascript:void(0);">$Title</a><% end_loop %>
					</p>
					<% end_if %>
					<p class="more">
						<a href="$Link" title="Go to $Title.XML page">More info</a>
					</p>
				</li>
			<% end_loop %>
		</ul>
		<a href="ajax/resources.json" class="load-more" data-target="resourceList">Load more resources</a>
	</div>
</section>