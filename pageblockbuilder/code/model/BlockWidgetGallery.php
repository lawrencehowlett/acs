<?php
/**
 * Represents the Gallery widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetGallery extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'RedirectButtonText' => 'Varchar'
	);

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'RedirectPage' => 'SiteTree'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Images' => 'BlockWidgetGalleryImage'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Images');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('RedirectPageID', 'RedirectButtonText')
		);

		$fields->insertBefore(
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree'), 
			'BackgroundImage'
		);

		$fields->insertAfter(
			TextField::create('RedirectButtonText', 'Redirect page button text'), 
			'RedirectPageID'
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Images', 
				'Images', 
				$this->Images(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))

			)
		);

		return $fields;
	}

	/**
	 * Get component name
	 */
	public function ComponentName() {
		return 'Gallery widget';
	}
}