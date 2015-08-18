<?php
/**
 * Represents the action box of a page
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class ActionBox extends DataObject {
	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar',
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
		'RedirectPage' => 'SiteTree', 
		'Background' => 'Image', 
		'Page' => 'Page'
	);

	/**
	 * Set summary fields
	 * 
	 * @var array
	 */
	private static $summary_fields = array(
		'Title'
	);

	/**
	 * Set default sort
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

		$fields->removeFieldsFromTab('Root.Main', array('SortOrder', 'PageID'));

		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->dataFieldByName('Background')
			->setFolderName('ActionBoxes/');

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		return $fields;
	}
}