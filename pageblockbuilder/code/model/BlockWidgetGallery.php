<?php
/**
 * Represents the Gallery widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetGallery extends BlockWidget {

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
			array('BackgroundImage')
		);

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'GalleryImages/' . $this->ID);

		$fields->insertBefore(
			GridField::create(
				'Images', 
				'Images', 
				$this->Images(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)

			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	/**
	 * Get component name
	 */
	public function ComponentName() {
		return 'Gallery sliding widget';
	}
}