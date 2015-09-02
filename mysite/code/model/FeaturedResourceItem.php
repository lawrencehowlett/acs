<?php
/*class FeaturedResourceItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'SortOrder' => 'Int'
	);	

	private static $has_one = array(
		'Parent' => 'FeaturedResource', 
		'RedirectPage' => 'SiteTree'
	);

	private static $singular_name = 'Resource';

	private static $plural_name = 'Resources';

	private static $summary_fields = array(
		'Title'
	);

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'SortOrder', 'Title'));

		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a resource page', 'SiteTree')
		);

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('Image', 'Image')
					->setFolderName($this->Parent()->Page()->Title . '/FeaturedResources/'), 
				'Content'
			);
		}

		return $fields;
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if (!$this->Title) {
			if ($this->RedirectPage()) {
				$this->Title = $this->RedirectPage()->Title;
			}
		}
	}
}*/