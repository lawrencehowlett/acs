<?php
/**
 * Represents the managed service page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class ManagedServicesPage extends Page {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/network-icon.png';

	/**
	 * Get CMS fields
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
 * Controls the managed service page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class ManagedServicesPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}