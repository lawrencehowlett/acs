<?php
/**
 * 
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetResources extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Resources' => 'BlockWidgetResourcesItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Resources', 
				'Resources', 
				$this->Resources(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	/**
	 * Get Component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Resources widget';
	}
}