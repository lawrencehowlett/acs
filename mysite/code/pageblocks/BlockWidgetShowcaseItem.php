<?php
/**
 * Represents the showcase items
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetShowcaseItem extends BlockWidgetTabItem {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'TabTitle' => 'Varchar',
		'ExtraClass' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'ShowcaseHolder' => 'BlockWidgetShowcase', 
		'BackgroundImage' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Showcase';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Showcases';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ShowcaseHolderID', 'ExtraClass', 'BackgroundImage', 'TabTitle')
		);

		$fields->insertAfter(TextField::create('TabTitle', 'Tab Title'), 'Title');
		$fields->insertAfter(TextField::create('ExtraClass', 'Extra class'), 'Content');

		$fields->insertAfter(
			UploadField::create('BackgroundImage', 'Background Image')
				->setFolderName('Showcase/BackgroundImages/'), 
			'Image'
		);

		$fields->dataFieldByName('TabIcon')
			->setFolderName('Showcase/TabIcons/');

		$fields->dataFieldByName('Image')
			->setFolderName('Showcase/Images/');

		return $fields;
	}
}