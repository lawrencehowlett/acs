<?php
/**
 * Represents the block widget items
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetWorkItem extends BlockWidgetSliderItem {
	/**
	 * Set the properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'ExtraClass' => 'Varchar', 
		'ButtonText' => 'Varchar'
	);

	/**
	 * Set the has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'WorkHolder' => 'BlockWidgetWork', 
		'RedirectPage' => 'SiteTree', 
		'TabIcon' => 'Image'
	);

	/**
	 * GSetet the singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Work';

	/**
	 * Set the plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Work';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Tagline', 'WorkHolderID', 'Image', 'Icon')
		);

		$fields->insertAfter(
			TextField::create('ExtraClass', 'Extra Class'), 
			'Content'
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->dataFieldByName('TabIcon')
			->setFolderName('HowWeWork/Icons');

		return $fields;
	}
}