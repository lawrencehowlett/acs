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
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Items', 
				'Scrolling Numbers', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))

			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Scrolling numbers widget';
	}
}