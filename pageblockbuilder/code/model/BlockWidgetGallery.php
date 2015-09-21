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
			array('ExtraClass', 'BackgroundImage')
		);

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'GalleryImages/' . $this->ID);
		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Images', 
				'Images', 
				$this->Images(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)

			)
		);

		return $fields;
	}

	/**
	 * Get the extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'mt60 mb30';
	}

	/**
	 * Get component name
	 */
	public function ComponentName() {
		return 'Gallery widget';
	}
}