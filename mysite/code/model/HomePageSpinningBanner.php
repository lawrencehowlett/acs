<?php
class HomePageSpinningBanner extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Description' => 'HTMLText', 
		'ExtraClass' => 'Varchar',
		'RedirectButtonText' => 'Varchar', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'HomePage' => 'HomePage', 
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	private static $summary_fields = array(
		'Title'
	);

	private static  $default_sort = 'SortOrder';

	private static $singular_name = 'Spinning Banner';

	private static $plural_name = 'Spinning Banners';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'HomePageID')
		);

		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->replaceField('RedirectPageID', TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree'));
		$fields->dataFieldByName('Description')
			->setRows(20);
		$fields->dataFieldByName('ExtraClass')
			->setRightTitle('available classes (link-it, link-workplace, link-cloud, link-recruitment)');	
		$fields->dataFieldByName('Image')
			->setFolderName('SpinningBanners/');

		return $fields;
	}
}