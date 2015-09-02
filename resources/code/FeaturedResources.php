<?php
class FeaturedResources extends DataObject {

	private static $db = array(
		'Title' => 'Text'
		);

	private static $has_one = array(
		'Page' => 'Page',
		'RedirectPage' => 'SiteTree'
	);

	private static $belongs_many_many = array(
		'Pages' => 'Page'
	);

	private static $singular_name = 'Resource';

	private static $plural_name = 'Resources';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Pages');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Title', 'SortOrder', 'PageID')
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		return $fields;
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();

		$this->Title = $this->RedirectPage()->Title;
	}

}