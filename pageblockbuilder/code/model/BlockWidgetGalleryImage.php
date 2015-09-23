<?php
/**
 * Represents the gallery images
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetGalleryImage extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Gallery' => 'BlockWidgetGallery', 
		'Image' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Gallery image';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Gallery images';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	private static $summary_fields = array(
		'Thumbnail' => 'Image', 
		'Title' => 'Title'
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
			array('SortOrder', 'GalleryID', 'Image')
		);
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('Image', 'Image')
					->setFolderName('GalleryImages/' . $this->ID), 
				'Content'
			);
		}

		return $fields;
	}

	public function Thumbnail() {
		return $this->Image()->CMSThumbnail();
	}
}