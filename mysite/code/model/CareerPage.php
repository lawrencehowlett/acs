<?php
/**
 * Represents the careers page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CareerPage extends Page {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'CareerOpportunityTitle' => 'Text', 
		'CareerOpportunityMailTo' => 'Varchar'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'CareerOpportunities' => 'CareerOpportunity'
	);

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/career-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeFieldsFromTab('Root.Main', array('Content'));

		$fields = $this->getCareerOppotunityFields($fields);

		return $fields;
	}

	private function getCareerOppotunityFields(&$fields) {
		$fields->addFieldToTab(
			'Root.CareerOpportunities', 
			TextField::create('CareerOpportunityTitle', 'Title')
		);

		$fields->addFieldToTab(
			'Root.CareerOpportunities', 
			EmailField::create('CareerOpportunityMailTo', 'Mail To')
		);

		$fields->addFieldToTab(
			'Root.CareerOpportunities', 
			GridField::create(
				'CareerOpportunities', 
				'Career Opportunities', 
				$this->CareerOpportunities(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}
}

/**
 * Controls the career page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CareerPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}