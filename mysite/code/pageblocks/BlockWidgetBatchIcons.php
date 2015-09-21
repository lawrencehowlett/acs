<?php
class BlockWidgetBatchIcons extends BlockWidgetGalleryImage {

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'BatchIconParent' => 'BlockWidgetBatchIconSlider', 		
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Content', 'BatchIconParentID')
		);

		return $fields;
	}
}