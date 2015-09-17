<?php
class BlockWidgetScrollingNumbersItem extends DataObject {

	private static $db = array(
		'Title' => 'Varchar', 
		'Value' => 'Varchar',
		'Decimal' => 'Int', 
		'Suffix' => 'Varchar',
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Parent' => 'BlockWidgetScrollingNumbers',
		'Image' => 'File'
	);

	private static $default_sort = 'SortOrder';

	private static $singular_name = 'Scolling number';

	private static $plural_name = 'Scolling numbers';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'ParentID')
		);

		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->dataFieldByName('Image')
			->setFolderName('ScrollingNumbers/Images/');

		return $fields;
	}
}