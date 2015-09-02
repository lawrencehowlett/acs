<?php
/**
 * Represents the case studies page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudiesPage extends Blog {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/case-icon.png';

	/**
	 * Set allowed children
	 * 
	 * @var string
	 */
	private static $allowed_children = array('CaseStudyPage');

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeByName('Authors');

		$fields->fieldByName('Root')
			->fieldByName('ChildPages')
			->setTitle('Case Studies');

		return $fields;
	}
}

/**
 * Controls the case studies page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudiesPage_Controller extends Blog_Controller {
	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}