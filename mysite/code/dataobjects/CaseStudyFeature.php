<?php
class CaseStudyFeature extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Description' => 'Text', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'CaseStudy' => 'CaseStudyPage',
		'Icon' => 'File'
	);

	private static $default_sort = 'SortOrder';

	private static $singular_name = 'Feature';

	private static $plural_name = 'Features';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('CaseStudyID', 'SortOrder')
		);

		$fields->replaceField('Title', TextField::create('Title', 'Title'));

		$fields->dataFieldByName('Icon')
			->setFolderName('CaseStudies/Features/Icons/ ');

		return $fields;
	}
}