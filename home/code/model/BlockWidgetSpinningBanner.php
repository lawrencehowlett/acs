<?php
class BlockWidgetSpinningBanner extends BlockWidgetTab {

	private static  $has_many = array(
		'SpinningBanners' => 'BlockWidgetSpinningBannerItem'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'Items')
		);

		$fields->removeByName('SpinningBanners');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'SpinningBanners', 
				'Spinning Banners', 
				$this->SpinningBanners(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}
}