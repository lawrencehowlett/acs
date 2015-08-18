<?php
class BlockWidgetActionBoxItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar'
	);	

	private static $has_one = array(
		'Parent' => 'BlockWidgetActionBox', 
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	private static $singular_name = 'Action box';

	private static $plural_name = 'Action boxes';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image'));
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
					->setFolderName($this->Parent()->Page()->Title . '/ActionBoxes/'), 
				'RedirectPageID'
			);
		}

		return $fields;
	}
}