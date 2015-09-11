<?php
class BlockWidgetProjects extends BlockWidgetSlider {

	private static  $has_many = array(
		'Projects' => 'BlockWidgetProjectItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Projects');
		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'FeaturedProjects/' . $this->ID . '/Images');
		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Projects', 
				'Projects', 
				$this->Projects(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'mt30';
	}

	public function ComponentName() {
		return 'Featured project gallery widget';
	}
}