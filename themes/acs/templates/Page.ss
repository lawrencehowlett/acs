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

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-67851099-1', 'auto');
		ga('send', 'pageview');	
	</script>

</head>

<body <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>

<% if not $IsAdminLoginPage %>
	<% include Header %>
	$Layout
<% else %>
	<header class="ebook-header">
		<a href="home.php">
			<img src="$SiteConfig.Logo.Link" alt="ACS">
		</a>
	</header>
	<section class="ebook-content cf">
		<article class="ebook-descr">
			<h1>$Title</h1>
			$Form
		</article>
	</section>	
<% end_if %>

<% include Footer %>

</body>
</html>
