<?php
/**
 * Represents the block widget slider
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetSlider extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'Items' => 'BlockWidgetSliderItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return Fieldlist
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Items', 
				'Sliders', 
				$this->Items(), 
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
		return 'Slider widget';
	}
}