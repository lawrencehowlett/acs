<?php
class Page extends SiteTree {

	private static $db = array(
		'Description' => 'HTMLText'
	);
}

class Page_Controller extends ContentController {

	public function init() {
		parent::init();

		Requirements::css('themes/acs/css/main.css');
		Requirements::css('themes/acs/css/jquery.mCustomScrollbar.min.css');
	}
}
