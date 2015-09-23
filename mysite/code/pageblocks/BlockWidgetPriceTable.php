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
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'PricingTables', 
				'Pricing Tables', 
				$this->PricingTables(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
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