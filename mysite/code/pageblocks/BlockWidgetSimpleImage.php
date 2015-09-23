<?php
/**
 * Represents the simage image text widget block
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetSimpleImage extends BlockWidget {
	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Content' => 'HTMLText'
	);	

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static  $has_one = array(
		'Image' => 'Image'
	);	

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Image Text';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->insertBefore(
			TextareaField::create('Title', 'Title')
				->setRows(2), 
			'Content'
		);

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->dataFieldByName('Image')
			->setTitle('Featured Image')
			->setFolderName('BlockWidgetSimpleImage/Images');

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return  string
	 */
	public function ComponentName() {
		return 'Speak to specialist image text widget';
	}	
}