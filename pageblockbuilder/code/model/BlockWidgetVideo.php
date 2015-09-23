<?php
/**
 * Represents the video widget block
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetVideo extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Tagline' => 'Text', 
		'Content' => 'HTMLText',
		'VideoURL' => 'Text', 
		'ButtonText' => 'Varchar'		
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Video Text';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Video Text';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->replaceField(
			'VideoURL', 
			TextField::create('VideoURL', 'Video URL')
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);		

		$fields->dataFieldByName('Image')
			->setTitle('Placeholder')
			->setFolderName('BlockWidgetVideo/' .$this->ID. '/Images');

		$fields->insertAfter($fields->dataFieldByName('Tagline'), 'Title');
		$fields->insertAfter($fields->dataFieldByName('Content'), 'Tagline');
		$fields->insertAfter($fields->dataFieldByName('VideoURL'), 'Content');
		$fields->insertAfter($fields->dataFieldByName('ButtonText'), 'VideoURL');
		$fields->insertAfter($fields->dataFieldByName('RedirectPageID'), 'ButtonText');
		$fields->insertAfter($fields->dataFieldByName('Image'), 'RedirectPageID');
		$fields->insertAfter($fields->dataFieldByName('BackgroundImage')->setFolderName('BlockWidgetVideo/' .$this->ID. '/BackgroundImages/'), 'Image');

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return  string
	 */
	public function ComponentName() {
		return 'Video text widget';
	}		
}