<?php
class BlockWidgetBatchIconSlider extends BlockWidgetGallery {
	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Icons' => 'BlockWidgetBatchIcons'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Images');
		$fields->removeByName('Icons');

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'BatchIconSlider/' . $this->ID . '/Images');
		$fields->insertBefore(
			GridField::create(
				'Icons', 
				'Icons', 
				$this->Icons(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)

			),
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Batch gallery slider widget';
	}
}