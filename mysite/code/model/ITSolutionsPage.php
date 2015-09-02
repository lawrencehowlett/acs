<?php
/**
 * Represents the IT solutions page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius 
 */
class ITSolutionsPage extends Page {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/idea-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields(){
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		return $fields;
	}
}

/**
 * Controls the IT solutions page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius 
 */
class ITSolutionsPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}