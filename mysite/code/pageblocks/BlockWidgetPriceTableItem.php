<?php
class BlockWidgetPriceTableItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Price' => 'Varchar',
		'Description' => 'Text', 
		'ButtonText' => 'Varchar', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Parent' => 'BlockWidgetPriceTable',
		'RedirectPage' => 'SiteTree', 
		'FeaturedImage' => 'Image'
	);

	private static $has_many = array(
		'Features' => 'BlockWidgetPriceTableFeature'
	);

	private static $singular_name = 'Pricing table';

	private static $plural_name = 'Pricing tables';

	private static $default_sort = 'SortOrder';

	private static $summary_fields = array(
		'Title'
	);	

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'ParentID')
		);

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('PricingTable/Images/');			

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);
		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		if ($this->ID) {
			$fields->dataFieldByName('Features')
				->getConfig()
				->addComponent(new GridFieldSortableRows('SortOrder'));
		}

		return $fields;
	}
}