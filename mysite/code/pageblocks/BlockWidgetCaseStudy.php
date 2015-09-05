<?php
class BlockWidgetCaseStudy extends BlockWidgetSliderItem {

	private static $has_one = array(
		'CaseStudiesHolder' => 'BlockWidgetCaseStudies'
	);

	private static $singular_name = 'Case Study';

	private static $plural_name = 'Case Studies';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('CaseStudiesHolderID', 'ExtraClass', 'TabIcon')
		);

		if ($this->ID) {
			$fields->dataFieldByName('Icon')
				->setFolderName('BlockWidgetCaseStudies/Icons');
			$fields->dataFieldByName('Image')
				->setFolderName('BlockWidgetCaseStudies/Images');
		}

		return $fields;
	}
}