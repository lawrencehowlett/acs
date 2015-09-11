<?php
/**
 * Represents the double slider widget item
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetDoubleSliderItem extends BlockWidgetSliderItem {

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'DoubleSliderParent' => 'BlockWidgetDoubleSlider'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Tagline', 'DoubleSliderParentID', 'Image', 'Content', 'ButtonText')
		);

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Image', 'Image')
					->setFolderName('DoubleSlider/' .$this->DoubleSliderParentID. '/Images/')
			);
		}

		return $fields;
	}
}