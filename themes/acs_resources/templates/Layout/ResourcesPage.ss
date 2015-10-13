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
				<% loop $ResourcesCategories %>
					<li class="tab">
						<a href="javascript:void(0);" class="filter" data-criteria="$CodeIdentifier">$Title</a>
					</li>
				<% end_loop %>
			</ul>
			<form class="content-search col col2" method="get" action="">
				<span class="field select">
					<span class="select-val"><% if $CurrentDocumentType %>$CurrentDocumentType.Title<% else %>Filter by document type<% end_if %></span>
					<select name="DocumentType">
						<option value="0">All</option>
						<% loop $ResourcesDocumentTypes %>
							<option value="$ID" <% if $Top.ParamDocumentType == $ID %>selected<% end_if %>>$Title</option>
						<% end_loop %>
					</select>
				</span>
				<label class="field searchbox">
					<input type="text" name="Keyword" placeholder="Search..." <% if $ParamKeyword %>value="$ParamKeyword"<% end_if %>> 
					<button type="submit" name="search" value="1">Search</button>
				</label>
			</form>
		</div>

		<ul class="res-list cols" id="resourceList">
			<% loop $Resources %>
				<li class="resource col col2 <% loop $Categories %>$CodeIdentifier <% end_loop %>">
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
							<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML page">More info</a>
						</p>
					<% end_if %>
				</li>
			<% end_loop %>
		</ul>
		<!--<a href="{$Link}LoadMore" class="load-more" data-target="resourceList">Load more resources</a>-->
	</div>
</section>