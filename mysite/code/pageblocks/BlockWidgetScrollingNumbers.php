<?php
class BlockWidgetScrollingNumbers extends BlockWidget {

	private static $has_many = array(
		'Items' => 'BlockWidgetScrollingNumbersItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ExtraClass', 'BackgroundImage')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Items', 
				'Scrolling Numbers', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))

			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'mt60 mb30';
	}

	public function ComponentName() {
		return 'Scrolling numbers widget';
	}
}