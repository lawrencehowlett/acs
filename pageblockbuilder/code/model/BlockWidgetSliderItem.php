<?php
/**
 * Represents the slider items
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetSliderItem extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Tagline' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar',
		'SortOrder' => 'Int'
	);	

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Parent' => 'BlockWidgetSlider', 
		'RedirectPage' => 'SiteTree', 
		'Image' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Slider';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Sliders';

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

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'SortOrder'));

		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->addFieldToTab(
			'Root.Main', 
			UploadField::create('Image', 'Image')
				->setFolderName('BlockWidgetSlider/SliderImages/')
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->insertAfter(
			$fields->dataFieldByName('RedirectPageID'), 
			'ButtonText'
		);

		return $fields;
	}
}