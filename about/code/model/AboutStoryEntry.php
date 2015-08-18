<?php
class AboutStoryEntry extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Date' => 'Date', 
		'Content' => 'HTMLText'
	);	

	private static $has_one = array(
		'Parent' => 'AboutStory', 
		'Image' => 'Image'
	);

	private static $singular_name = 'Story';

	private static $plural_name = 'Stories';

	private static $summary_fields = array(
		'Date.Full', 
		'Title'
	);

	private static $default_sort = 'Date DESC';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image', 'SortOrder'));
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->dataFieldByName('Date')
			->setConfig('showcalendar', true)
			->setConfig('dateFormat', 'dd.MM.YYY');

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('Image', 'Image')
					->setFolderName($this->Parent()->Page()->Title . '/AboutStories/'), 
				'Content'
			);
		}

		return $fields;
	}
}