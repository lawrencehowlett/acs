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

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Projects', 
				'Projects', 
				$this->Projects(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Projects widget';
	}
}