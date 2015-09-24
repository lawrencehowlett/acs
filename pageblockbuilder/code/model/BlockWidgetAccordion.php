<?php
class BlockWidgetAccordion extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $has_many = array(
		'Items' => 'BlockWidgetAccordionItem'
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
				'Accordion blocks', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Accordion widget';
	}
}