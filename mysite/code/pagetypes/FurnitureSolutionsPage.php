<?php
class FurnitureSolutionsPage extends Page {

	private static $icon = 'mysite/images/sofa-chair-icon.png';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

class FurnitureSolutionsPage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}