<?php
class BlockWidgetMap extends BlockWidget {

	private static $has_many = array(
		'RegionalOffices' => 'BlockWidgetMapRegionalOffices'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('RegionalOffices');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);
		$fields->insertBefore(
			GridField::create(
				'RegionalOffices', 
				'Regional Offices', 
				$this->RegionalOffices(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Map widget';
	}
}