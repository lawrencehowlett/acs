<?php
class MicroPage extends Page {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'microsite/images/microsoft-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Content')
		);

		return $fields;
	}
}

class MicroPage_Controller extends Page_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	/**
	 * Get Micro holder page
	 * 
	 * @return MicroPage
	 */
	public function getMicroHolder() {
		return MicroPage::get()->Last();
	}
}