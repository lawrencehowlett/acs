<?php
/**
 * Represents the columns of the table
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTableColumns extends DataObject {

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
		'Row' => 'BlockWidgetTableRows'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Column';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Columns';

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
			array('RowID', 'SortOrder')
		);

		$fields->dataFieldByName('Title')
			->setTitle('Text')
			->setRows(2);

		return $fields;
	}
}