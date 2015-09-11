<?php
class BlockWidgetCaseStudy extends BlockWidgetSliderItem {

	private static $has_one = array(
		'CaseStudiesHolder' => 'BlockWidgetCaseStudies', 
		'Icon' => 'Image'
	);

	private static $singular_name = 'Case Study';

	private static $plural_name = 'Case Studies';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('CaseStudiesHolderID', 'ExtraClass', 'TabIcon', 'Tagline')
		);

		if ($this->ID) {
			$fields->dataFieldByName('Icon')
				->setFolderName('FeaturedCaseStudiesSliderWidget/' .$this->CaseStudiesHolderID. '/Icons');
			$fields->dataFieldByName('Image')
				->setFolderName('FeaturedCaseStudiesSliderWidget/' .$this->CaseStudiesHolderID. '/Images')
				->setTitle('Background image');
		}

		return $fields;
	}
}