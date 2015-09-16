<?php
/**
 * Represents the block widget text with title
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class BlockWidgetText extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Tagline' => 'Text', 
		'Layout' => "Enum(array('Standard', 'Two Column'), 'Standard')", 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'RedirectPage' => 'SiteTree'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Text';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Text';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('Title', 'BackgroundImage', 'ExtraClass'));
		$fields->insertBefore(
			TextField::create('Title', 'Title'), 
			'Tagline'
		);
		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);
		$fields->insertAfter($fields->dataFieldByName('RedirectPageID'), 'Content');
		$fields->insertBefore($fields->dataFieldByName('ButtonText'), 'RedirectPageID');

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return  string
	 */
	public function ComponentName() {
		return 'Text widget';
	}

	/**
	 * Set the class needed for the text widget
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'shade text-section';
	}
}