<?php
/**
 * Represents the double slider widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetDoubleSlider extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'DoubleSliderItems' => 'BlockWidgetDoubleSliderItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');
		$fields->removeByName('DoubleSliderItems');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'DoubleSlider/' . $this->ID . '/Images');
		$fields->insertBefore(
			GridField::create(
				'DoubleSliderItems', 
				'Sliders', 
				$this->DoubleSliderItems(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)
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
		return 'Double slider widget';
	}
}