<?php
class BlockWidgetWorkItem extends BlockWidgetSliderItem {

	private static $db = array(
		'ExtraClass' => 'Varchar', 
		'ButtonText' => 'Varchar'
	);

	private static $has_one = array(
		'WorkHolder' => 'BlockWidgetWork', 
		'RedirectPage' => 'SiteTree'
	);

	private static $singular_name = 'Work';

	private static $plural_name = 'Work';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Tagline', 'WorkHolderID', 'TabIcon', 'Image', 'Icon')
		);

		$fields->insertAfter(
			TextField::create('ExtraClass', 'Extra Class'), 
			'Content'
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		return $fields;
	}
}