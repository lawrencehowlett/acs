<?php
/**
 * Represents the image widget block
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetImage extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Tagline' => 'Text', 
		'Content' => 'HTMLText',
		'ButtonText' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static  $has_one = array(
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Image Text';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Image Text';


	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ExtraClass')
		);

		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);		

		$fields->dataFieldByName('Image')
			->setTitle('Featured Image')
			->setFolderName('BlockWidgetImage/Images');

		$fields->insertAfter($fields->dataFieldByName('Tagline'), 'Title');
		$fields->insertAfter($fields->dataFieldByName('Content'), 'Tagline');
		$fields->insertAfter($fields->dataFieldByName('Image'), 'Content');
		$fields->insertBefore($fields->dataFieldByName('ButtonText'), 'Image');
		$fields->insertBefore($fields->dataFieldByName('RedirectPageID'), 'Image');	

		return $fields;
	}

	/**
	 * Get extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		if (!is_dir('../' .$this->BackgroundImage()->Filename) || $this->Tagline) {
			return 'video-section';
		}

		return 'shade mt60 mb30';
	}


	/**
	 * Get component name
	 *
	 * @return  string
	 */
	public function ComponentName() {
		return 'Image text widget';
	}	
}