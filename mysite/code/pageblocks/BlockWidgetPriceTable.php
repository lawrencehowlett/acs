<?php
class BlockWidgetPriceTable extends BlockWidget {

	private static $has_many = array(
		'PricingTables' => 'BlockWidgetPriceTableItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('PricingTables');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ExtraClass', 'BackgroundImage')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'PricingTables', 
				'Pricing Tables', 
				$this->PricingTables(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'mb40';
	}

	public function ComponentName() {
		return 'Price table widget';
	}
}