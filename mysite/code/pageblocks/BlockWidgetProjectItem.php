<?php
class BlockWidgetProjectItem extends BlockWidgetSliderItem {

	private static $has_one = array(
		'ProjectHolder' => 'BlockWidgetProjects'
	);

	private static $singular_name = 'Project';

	private static $plural_name = 'Projects';

	private static $default_sort = 'SortOrder';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ProjectHolderID', 'ExtraClass', 'TabIcon', 'ButtonText', 'Icon', 'Image', 'Tagline')
		);

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Image', 'Image')
					->setFolderName('FeaturedProjects/' .$this->Parent()->ID. '/Images/')
			);
		}

		return $fields;
	}
}