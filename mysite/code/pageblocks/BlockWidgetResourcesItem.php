<?php
/**
 * Resources widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetResourcesItem extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'SortOrder' => 'Int'
	);

	/**
	 * Ste has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'ResourcesHolder' => 'BlockWidgetResources',
		'RedirectPage' => 'SiteTree'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Resources';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Resources';

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

		$fields->removeByName('Pages');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Title', 'SortOrder', 'PageID', 'ResourcesHolderID')
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		return $fields;
	}

	/**
	 * Hook on before write
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();

		$this->Title = $this->RedirectPage()->Title;
	}
}