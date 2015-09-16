<?php
class BlockWidgetActionBoxItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar', 
		'StartLiveChat' => 'Boolean', 
		'SortOrder' => 'Int'
	);	

	private static $has_one = array(
		'Parent' => 'BlockWidgetActionBox', 
		'RedirectPage' => 'SiteTree',
		'Image' => 'File'
	);

	private static $singular_name = 'Action box';

	private static $plural_name = 'Action boxes';

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image', 'SortOrder', 'ButtonText'));
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->insertAfter(
			$fields->dataFieldByName('StartLiveChat'), 
			'RedirectPageID'
		);		
		
		$fields->insertAfter(
			UploadField::create('Image', 'Featured Image')
				->setFolderName('ActionBoxes/Images'), 
			'StartLiveChat'
		);

		return $fields;
	}
}