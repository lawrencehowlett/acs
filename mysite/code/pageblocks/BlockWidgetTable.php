<?php
/**
 * Represents the table widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTable extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Rows' => 'BlockWidgetTableRows', 
	);

	/**
	 * Get the CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Rows');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Rows', 
				'Rows', 
				$this->Rows(),
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	/**
	 * Get the column name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Table widget';
	}
}