<?php
class HomePage extends Page {

	private static $has_many = array(
		'SpinningBanners' => 'HomePageSpinningBanner'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		$fields->addFieldToTab(
			'Root.SpinningBanners', 
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

class HomePage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}