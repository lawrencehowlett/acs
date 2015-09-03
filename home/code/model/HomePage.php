<?php
class HomePage extends Page {

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

class HomePage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}