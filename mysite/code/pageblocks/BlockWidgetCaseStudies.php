<?php
class BlockWidgetCaseStudies extends BlockWidgetSlider {

	private static  $has_many = array(
		'CaseStudies' => 'BlockWidgetCaseStudy'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'Items', 'Image', 'Icon')
		);

		$fields->removeByName('CaseStudies');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'CaseStudies', 
				'CaseStudies', 
				$this->CaseStudies(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'cs-showcase navigated-slider';
	}

	/**
	 * Get the component name
	 */
	public function ComponentName() {
		return 'Case studies showcase widget';
	}
}