<?php
/**
 * Represents the list of career job openings
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CareerOpportunity extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Location' => 'Varchar', 
		'Offer' => 'Varchar',
		'SortOrder' => 'Int'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Page' => 'CareerPage'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Requirements' => 'CareerOpportunityRequirement'
	);

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Requirements');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('PageID')
		);

		$fields->replaceField('Title', TextField::create('Title', 'Title'));

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				GridField::create(
					'Requirements', 
					'Requirements', 
					$this->Requirements(), 
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			);
		}

		return $fields;
	}
}