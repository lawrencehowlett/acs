<section class="page-section page-header" style='<% if $Banner %>background-image: url("$Banner.Link")<% end_if %>'>
	<div class="inside">
		<p class="post-date">$PublishDate.Full</p>
		$Description
		<ul class="post-meta">
			<% if $Authors %><li>Article by <a href="javascript:void(0);">$Authors.First.FirstName $Authors.First.Surname</a></li><% end_if %>
			<% if $Categories %><li>Posted in <% loop $Categories %><a href="$Link">$Title</a><% if not $Last %>&nbsp;&nbsp;&nbsp;<% end_if %><% end_loop %></li><% end_if %>
			<% if $Tags %><li>Tags <% loop $Tags %><a href="$Link">$Title</a><% if not $Last %>&nbsp;&nbsp;&nbsp;<% end_if %><% end_loop %></li><% end_if %>
		</ul>
	</div>
</section>

<section class="page-section text-content blog">
	<div class="inside cf">
		<aside class="left">
			<div class="widget">
				<ul class="blog-social">
					<li><span class='social facebook st_facebook_custom' displayText='Facebook'></span></li>
					<li><span class='social googleplus st_twitter_custom' displayText='Tweet'></span></li>
					<li><span class='social twitter st_linkedin_custom' displayText='LinkedIn'></span></li>
					<li><span class='social linkedin st_googleplus_custom' displayText='Google +'></span></li>
				</ul>				
			</div>
		</aside>
		<section class="blog-main">
			<article class="blog-content reading">
				$Content
			</article>	
			<% if $Authors %>
				<section class="blog-section">
					<h2 class="section-title">Author</h2>
					<article class="blog-post-author cf">
						<div class="author-portrait">
							<% if $Authors.First %>
								<img src="$Authors.First.BlogProfileImage.Link" alt="$Authors.First.BlogProfileImage.Title">
							<% end_if %>

							<ul class="author-contact">
								<li><a href="mailto:$Authors.First.Email" class="mail">E-mail</a></li>
								<% if $Authors.First.Twitter %>
									<li><a href="$Authors.First.Twitter" class="twitter" target="_blank">Twitter</a></li>
								<% end_if %>
							</ul>
						</div>
						<div class="author-descr">
							<h3 class="author-name">$Authors.First.FirstName $Authors.First.Surname</h3>
							<p class="author-position">$Authors.First.Position</p>
							<p>$Authors.First.BlogProfileSummary</p>
						</div>					
					</article>
				</section>
			<% end_if %>

			<section class="blog-section comments">
				<a href="#" class="comments-toggle">Comments</a>

				<div id="disqus_thread"></div>
				<script type="text/javascript">
				    /* * * CONFIGURATION VARIABLES * * */
				    var disqus_shortname = 'acs365';
				    
				    /* * * DON'T EDIT BELOW THIS LINE * * */
				    (function() {
				        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
			</section>

			<% if $RelatedBlogPosts %>
				<section class="blog-section old-posts">
					<h2 class="section-title">Related posts</h2>
					<ul class="old-posts-slider">
						<% loop $RelatedBlogPosts %>
							<% if $First || $Modulus(2) %>
								<li>
							<% end_if %>

								<article class="postlist-item">
									<p class="post-item-date">$PublishDate.Full</p>
									<h3 class="post-item-title">
										<a href="$Link" title="Go to $Title.XML page">
											<% if $MenuTitle %>
												$MenuTitle.XML
											<% else %>
												$Title.XML
											<% end_if %>
										</a>
									</h3>
									<% if $Summary %>$Summary<% else %>$Excerpt<% end_if %>

									<% if $Categories %>
										<p class="post-item-meta">Posted in 
											<% loop $Categories %>
												<a href="$Link" title="Go to $Title posts">$Title</a><% if $Last %>, <% end_if %>
											<% end_loop %>
										</p>
									<% end_if %>
									
									<p class="more"><a href="$Link" title="Go to $Title.XML page">Read more</a></p>
								</article>

							<% if $Last || $MultipleOf(2) %>
								</li>
							<% end_if %>

						<% end_loop %>
					</ul>
				</section>
			<% end_if %>
		</section>

		<aside class="blog-sidebar">
			<% include BlogSideBar %>
		</aside>

	</div>
</section>