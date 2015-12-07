<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(false)

	<link rel="shortcut icon" href="$ThemeDir/img/favicon.png" type="image/png">
	<link rel="icon" href="$ThemeDir/img/favicon.png" type="image/png">

</head>

<body class="ebook">
<header class="ebook-header">
	<a href="/">
		<img src="$ThemeDir/img/logo-large.png" alt="ACS">
	</a>
</header>

<section class="ebook-content cf">
	$Layout
</section>

<footer class="ebook-footer">
	<ul class="ebook-social">
		<li><span class='social facebook st_facebook_custom' displayText='Facebook'></span></li>
		<li><span class='social googleplus st_googleplus_custom' displayText='Google'></span></li>
		<li><span class='social twitter st_twitter_custom' displayText='Tweet'></span></li>
		<li><span class='social linkedin st_linkedin_custom' displayText='LinkedIn +'></span></li>
	</ul>
</footer>

</body>
</html>