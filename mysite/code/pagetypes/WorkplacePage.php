<?php
class WorkplacePage extends Page {

	private static $icon = 'mysite/images/workplace-icon.png';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

class WorkPlacePage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}