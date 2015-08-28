<?php
class BlockWidgetTabItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar', 
		'SortOrder' => 'Int'
	);	

	private static $has_one = array(
		'Parent' => 'BlockWidgetTab', 
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	private static $singular_name = 'Tab';

	private static $plural_name = 'Tabs';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image', 'SortOrder'));
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->dataFieldByName('ButtonText')->setTitle('Redirect button title');
		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('Image', 'Image')
					->setFolderName($this->Parent()->Page()->Title . '/SliderImages/'), 
				'RedirectPageID'
			);
		}

		return $fields;
	}
}