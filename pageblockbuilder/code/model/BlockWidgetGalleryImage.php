<?php
class BlockWidgetGalleryImage extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Gallery' => 'BlockWidgetGallery', 
		'Image' => 'Image'
	);

	private static $singular_name = 'Gallery image';

	private static $plural_name = 'Gallery images';

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
}