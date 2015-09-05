<?php
class BlockWidgetWork extends BlockWidgetSlider {

	private static  $has_many = array(
		'Works' => 'BlockWidgetWorkItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Works');
		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Works', 
				'Works', 
				$this->Works(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Works widget';
	}
}