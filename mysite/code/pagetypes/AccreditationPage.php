<?php
/**
 * Represents the accreditation page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class AccreditationPage extends Page {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Partners' => 'AccreditationPartner'
	);

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/sign-check-icon.png';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeByName('BlockBuilder');

		$fields->addFieldToTab(
			'Root.Partners', 
			GridField::create(
				'Partners', 
				'Partners', 
				$this->Partners(), 
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function canShowBlockBuilder() {
		return false;
	}
}

/**
 * Controls the accreditation page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class AccreditationPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}