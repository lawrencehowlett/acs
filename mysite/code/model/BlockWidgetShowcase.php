<?php
class BlockWidgetShowcase extends BlockWidgetTab {

	private static $has_many = array(
		'ShowcaseItems' => 'BlockWidgetShowcaseItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'Items')
		);

		$fields->removeByName('ShowcaseItems');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'ShowcaseItems', 
				'Showcase', 
				$this->ShowcaseItems(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}


	public function ComponentName() {
		return 'Showcase Widget';
	}
}