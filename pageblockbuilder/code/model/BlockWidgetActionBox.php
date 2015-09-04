<?php
class BlockWidgetActionBox extends BlockWidget {

	private static  $has_many = array(
		'Items' => 'BlockWidgetActionBoxItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Items', 
				'Action Boxes', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Action box widget';
	}
}