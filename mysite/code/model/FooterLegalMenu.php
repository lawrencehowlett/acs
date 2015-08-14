<?php
class FooterLegalMenu extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'SiteConfig' => 'SiteConfig',
		'Page' => 'SiteTree'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Title', 'SortOrder', 'SiteConfigID')
		);

		$fields->replaceField(
			'PageID', 
			TreedropdownField::create('PageID', 'Choose a page', 'SiteTree')
		);

		return $fields;
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();

		$this->Title = $this->Page()->Title;
	}	
}