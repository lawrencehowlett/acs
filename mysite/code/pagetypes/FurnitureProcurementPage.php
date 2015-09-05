<?php
/**
 * Represents the procurement page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class FurnitureProcurementPage extends Page {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/wallet-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

/**
 * Controls the procurement page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class FurnitureProcurementPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}