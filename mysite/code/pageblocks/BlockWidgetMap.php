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
			array('BackgroundImage', 'ExtraClass')
		);
		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'RegionalOffices', 
				'Regional Offices', 
				$this->RegionalOffices(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'address-section last-section';
	}

	public function ComponentName() {
		return 'Map widget';
	}
}