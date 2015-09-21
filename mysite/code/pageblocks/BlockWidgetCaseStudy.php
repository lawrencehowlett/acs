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
			array('CaseStudiesHolderID', 'ExtraClass', 'TabIcon', 'Icon', 'Image')
		);

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Icon', 'Icon')
					->setFolderName('FeaturedCaseStudiesSliderWidget/' .$this->CaseStudiesHolderID. '/Icons')
			);

			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Image', 'Background Image')
					->setFolderName('FeaturedCaseStudiesSliderWidget/' .$this->CaseStudiesHolderID. '/Images')
			);
		}

		return $fields;
	}
}