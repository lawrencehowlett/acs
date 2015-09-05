<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<h1 class="page-title">$Title</h1>
		$Description
	</div>
</section>

<% if $Widgets %>
	<% loop $Widgets %>

		<section class="page-section $ExtraClass">

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

			<% if $ClassName == 'BlockWidgetText' %>
				<article class="inside cf">
					<header class="text-section-header">
						<h2 class="section-title">Proactive IT Solutions, Office Furniture, Cloud Services &amp; Recruitment</h2>
						<p class="lead">Lorem ipsum dolor amet, consectetur adipiscing elit. Aliquam erat volutpat, donec placerat.</p>
					</header>
					<div class="text-section-content">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </p>
						<p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
					</div>
				</article>
			<% end_if %>

		</section>	

	<% end_loop %>
<% end_if %>