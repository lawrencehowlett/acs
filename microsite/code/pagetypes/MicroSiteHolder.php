<?php
class MicroSiteHolder extends Page {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Telephone' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Logo' => 'Image'
	);

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'microsite/images/blue-folder-icon.png';

	/**
	 * Set allowed children
	 * 
	 * @var array
	 */
	private static $allowed_children = array('MicroPage');

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Content')
		);

		$fields->insertAfter(
			UploadField::create('Logo', 'Logo')
				->setFolderName('Microsite/Logos'), 
			'Banner'
		);

		$fields->insertAfter(
			TextField::create('Telephone', 'Telephone'), 
			'Logo'
		);

		return $fields;
	}
}

class MicroSiteHolder_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}

	public function getMicroMenus() {
		return MicroPage::get()->filter(array('ParentID' => $this->ID));
	}
}