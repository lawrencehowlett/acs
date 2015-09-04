<?php
class BlockWidgetProjectItem extends BlockWidgetSliderItem {

	private static $has_one = array(
		'ProjectHolder' => 'BlockWidgetProjects'
	);

	private static $singular_name = 'Project';

	private static $plural_name = 'Projects';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ProjectHolderID', 'ExtraClass', 'TabIcon', 'ButtonText', 'Icon')
		);

		if ($this->ID) {
			$fields->dataFieldByName('Image')
				->setFolderName('BlockWidgetProjects/Images');
		}

		return $fields;
	}
}