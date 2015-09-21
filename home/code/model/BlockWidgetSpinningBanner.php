<?php
/**
 * Represents the spinning banner
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetSpinningBanner extends BlockWidgetTab {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'SpinningBanners' => 'BlockWidgetSpinningBannerItem'
	);

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
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

	/**
	 * Get extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'main-showcase navigated-slider';
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Spinning Banner Widget';
	}	
}