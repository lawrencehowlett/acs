<?php
/**
 * Represents the tab widget items
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTabItem extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar', 
		'SortOrder' => 'Int'
	);	

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Parent' => 'BlockWidgetTab', 
		'RedirectPage' => 'SiteTree', 
		'TabIcon' => 'Image',
		'Image' => 'Image'
	);

	/**
	 * Set singular 
	 * 
	 * @var string
	 */
	private static $singular_name = 'Tab item';

	/**
	 * Set plural
	 * 
	 * @var string
	 */
	private static $plural_name = 'Tab items';

	/**
	 * Set default sort order
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image', 'TabIcon', 'SortOrder'));
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->dataFieldByName('ButtonText')
			->setTitle('Redirect button title');
		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->insertAfter(
			UploadField::create('TabIcon', 'Tab icon')
				->setFolderName('/TabImages/'), 
			'RedirectPageID'
		);

		$fields->insertAfter(
			UploadField::create('Image', 'Image')
				->setFolderName('/TabImages/'), 
			'TabIcon'
		);

		return $fields;
	}
}