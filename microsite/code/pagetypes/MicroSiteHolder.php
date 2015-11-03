<?php
/**
 * Represents the microsite parent page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class MicroSiteHolder extends GenericPage {

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
	private static $allowed_children = array('MicroPage', 'JobPage', 'RedirectorPage');

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

class MicroSiteHolder_Controller extends GenericPage_Controller {

	public function init() {
		parent::init();
	}

	public function getMicroMenus() {
		return SiteTree::get()->filter(array('ParentID' => $this->ID));
	}
}