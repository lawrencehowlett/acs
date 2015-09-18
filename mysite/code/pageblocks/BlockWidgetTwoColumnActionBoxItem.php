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
	private static $plural_name = 'Action boxes';

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

		$fields->addFieldToTab(
			'Root.Main', 
			UploadField::create('Image', 'Icon')
				->setFolderName('BlockWidgetTwoColumnActionBox/Images')
		);

		return $fields;
	}
}