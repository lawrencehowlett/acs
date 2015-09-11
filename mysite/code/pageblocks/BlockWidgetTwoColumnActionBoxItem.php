<?php
class BlockWidgetTwoColumnActionBoxItem extends BlockWidgetActionBoxItem {
	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static  $has_one = array(
		'TwoColumnActionBoxParent' => 'BlockWidgetTwoColumnActionBox'
	);

	/**
	 * Get singualr name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Action box';

	/**
	 * Get plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Action boxe';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Image', 'TwoColumnActionBoxParentID')
		);

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Image', 'Icon')
					->setFolderName('BlockWidgetTwoColumnActionBox/' .$this->TwoColumnActionBoxParent()->ID. '/Images')
			);
		}

		return $fields;
	}
}