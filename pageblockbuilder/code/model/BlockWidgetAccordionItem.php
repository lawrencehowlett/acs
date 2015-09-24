<?php
class BlockWidgetAccordionItem extends DataObject {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Accordion' => 'BlockWidgetAccordion'
	);

	private static $singular_name = 'Accordion Block';

	private static $plural_name = 'Accordion Blocks';

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'AccordionID')
		);

		$fields->dataFieldByName('Content')
			->setRows(20);

		return $fields;
	}
}