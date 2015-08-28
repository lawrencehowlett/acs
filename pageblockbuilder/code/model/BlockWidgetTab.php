<?php
class BlockWidgetTab extends BlockWidget {

	private static  $has_many = array(
		'Items' => 'BlockWidgetTabItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Items', 
				'Sliders', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Tab widget';
	}
}