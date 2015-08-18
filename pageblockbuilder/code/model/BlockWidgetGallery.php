<?php
class BlockWidgetGallery extends BlockWidget {

	private static $has_many = array(
		'Images' => 'BlockWidgetGalleryImage'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Images');

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

	public function ComponentName() {
		return 'Gallery widget';
	}
}