<?php
class BlockWidgetPriceTableFeature extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Item' => 'BlockWidgetPriceTableItem'
	);

	private static $singular_name = 'Feature';

	private static $plural_name = 'Features';

	private static $default_sort = 'SortOrder';

	private static $summary_fields = array(
		'Title'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ItemID', 'SortOrder')
		);

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);

		return $fields;
	}
}