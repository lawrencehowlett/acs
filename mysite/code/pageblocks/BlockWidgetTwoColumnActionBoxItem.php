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
	public function getCSMFields() {
		$fields = parent::getCSMFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Image')
		);

		if ($this->ID) {
			$fields->dataFieldByName('Image')
				->setTitle('Icon')
				->setFolderName('BlockWidgetTwoColumnActionBox/' .$this->TwoColumnActionBoxParent()->ID. '/Images');
		}

		return $fields;
	}
}