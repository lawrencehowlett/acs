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
		'SortOrder' => 'Int', 
		'StartLiveChat' => 'Boolean', 
	);

	/**
	 * Set has one 
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'RedirectPage' => 'SiteTree', 
		'Background' => 'Image'
	);

	/**
	 * Set belongs many many
	 * 
	 * @var array
	 */
	private static $belongs_many_many = array(
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

	private static $singular_name = 'Teaser';

	private static $plural_name = 'Teasers';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Page');

		$fields->removeFieldsFromTab('Root.Main', array('SortOrder', 'PageID'));

		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->dataFieldByName('Background')
			->setFolderName('ActionBoxes/');

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->insertAfter(
			$fields->dataFieldByName('StartLiveChat'), 
			'RedirectPageID'
		);

		return $fields;
	}
}