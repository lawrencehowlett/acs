<?php
class BlockWidgetTab extends DataObject {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Page' => 'Page', 
		'Image' => 'Image'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('PageID', 'SortOrder')
		);

		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->dataFieldByName('Image')
			->setFolderName('Tabs/');

		return $fields;
	}
}