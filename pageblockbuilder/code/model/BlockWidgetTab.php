<?php
/**
 * Represents the tab block widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTab extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'Items' => 'BlockWidgetTabItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'ExtraClass')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Items', 
				'Items', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	/**
	 * Get extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'mt60';
	}

	/**
	 * Get component name
	 *
	 * @return  string
	 */
	public function ComponentName() {
		return 'Tab widget';
	}
}