<?php
class CareerOpportunityRequirement extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Parent' => 'CareerOpportunity'
	);

	private static $default_sort = 'SortOrder';

	private static $singular_name = 'Requirement';

	private static $plural_name = 'Requirements';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ParentID', 'SortOrder')
		);

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);

		return $fields;
	}
}