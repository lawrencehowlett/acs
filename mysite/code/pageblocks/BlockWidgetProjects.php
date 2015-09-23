<?php
/**
 * Represents the block widget projects 
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetProjects extends BlockWidgetSlider {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'Projects' => 'BlockWidgetProjectItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Projects');
		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Projects', 
				'Projects', 
				$this->Projects(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Featured slider widget';
	}
}