<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					
					<% if $SectionTitle %>
						<header class="text-section-header">
							$SectionTitle
						</header>
					<% end_if %>

					<div class="text-section-content">
						$Content
						<% if $RedirectPage %>
							<p class="more">
								<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title">$ButtonText</a>
							</p>
						<% end_if %>
					</div>
				</article>
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
									<a href="$RedirectPage.Link" title="Go to $RedirectPage.Title.XML">$Title</a>
								</h3>
								$Content
							</div>
						</article>
					<% end_loop %>
				</div>			
			<% end_if %>

		</section>

	<% end_loop %>
<% end_if %>