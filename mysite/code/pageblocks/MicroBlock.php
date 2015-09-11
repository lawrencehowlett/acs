<?php
class MicroBlock extends BlockWidgetActionBox {

	private static $has_many = array(
		'Blocks' => 'MicroBlockItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');
		$fields->removeByName('Blocks');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Blocks', 
				'Blocks', 
				$this->Blocks(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'mt60';
	}

	public function ComponentName() {
		return 'Micro block widget';
	}
}