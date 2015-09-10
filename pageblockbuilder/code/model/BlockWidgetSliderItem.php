<?php
class BlockWidgetSliderItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Tagline' => 'Text', 
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);	

	private static $has_one = array(
		'Parent' => 'BlockWidgetSlider', 
		'Image' => 'Image'
	);

	private static $singular_name = 'Slider';

	private static $plural_name = 'Sliders';

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'SortOrder'));

		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->addFieldToTab(
			'Root.Main', 
			UploadField::create('Image', 'Image')
				->setFolderName('BlockWidgetSlider/' .$this->Parent()->ID. '/SliderImages/')
		);

		return $fields;
	}
}