<?php
/**
 * Represents the table rows
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTableRows extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text',
		'IsHeading' => 'Boolean',
		'SortOrder' => 'Int'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Columns' => 'BlockWidgetTableColumns'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Table' => 'BlockWidgetTable'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Row';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Rows';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Columns');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'TableID')
		);

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);

		$fields->dataFieldByName('IsHeading')
			->setTitle('Is the table heading?');

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				GridField::create(
					'Columns', 
					'Columns', 
					$this->Columns(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			);
		}

		return $fields;
	}
}