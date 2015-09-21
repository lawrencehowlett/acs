<?php
class AboutPage extends Page {
	private static $icon = 'about/images/info-icon.png';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

class AboutPage_Controller extends Page_Controller {
	public function init() {
		parent::init();
	}
}