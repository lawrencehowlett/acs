<?php
/**
 * Represents the item for the project block
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetProjectItem extends DataObject {

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
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'ProjectHolder' => 'BlockWidgetProjects', 
		'RedirectPage' => 'SiteTree'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Case Study';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Case Studies';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ProjectHolderID', 'SortOrder', 'Title')
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create(
				'RedirectPageID', 
				'Choose a case study page', 
				'SiteTree'
			)
		);

		return $fields;
	}

	/**
	 * hook on before write to db
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->Title = $this->RedirectPage()->Title;
	}
}