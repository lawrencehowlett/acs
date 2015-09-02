<?php
class BlockWidgetSpinningBannerItem extends BlockWidgetTabItem {

	private static $db = array(
		'ExtraClass' => 'Varchar'
	);

	private static $has_one = array(
		'SpinningBannerHolder' => 'BlockWidgetSpinningBanner'
	);

	private static $singular_name = 'Spinning Banner';

	private static $plural_name = 'Spinning Banners';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SpinningBannerHolderID', 'ExtraClass', 'TabIcon')
		);

		$fields->insertAfter(TextField::create('ExtraClass', 'Extra class'), 'Content');

		return $fields;
	}
}