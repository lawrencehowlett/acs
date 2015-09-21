<?php
class SpeakToSpecialistPage extends Page {

	private static $icon = 'mysite/images/call-specialist-icon.png';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

class SpeakToSpecialistPage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}