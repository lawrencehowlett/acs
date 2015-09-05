<?php
class BlockWidgetMultipleTextImageBlockItem extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'TextImageHolder' => 'BlockWidgetMultipleTextImageBlock', 
		'RedirectPage' => 'SiteTree',
		'Image' => 'Image'
	);

	/**
	 * Se singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Text image block';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Text image blocks';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'TextImageHolderID')
		);
		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->dataFieldByName('Title')
			->setRows(2);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->dataFieldByName('Image')
			->setTitle('Featured Image')
			->setFolderName('BlockWidgetMultipleTextImageBlocks/Images');

		return $fields;
	}
}