window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set._.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");$.src="//v2.zopim.com/?3GXtimaNFI214I1GAueyzPO4oU104vqc";z.t=+new Date;$.type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");	
$zopim(function(){
	$zopim.livechat.window.hide();
	$zopim.livechat.window.setTitle('Live Chat');

	$zopim.livechat.setGreetings({
		'online': 'Chat with us',
		'offline': 'Chat with us'
	});
});

$('a.livechat').click(function(e){
	e.preventDefault();
	$zopim.livechat.window.show();
});
