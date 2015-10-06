<?php
class ResourcesActionBox extends DataObject {

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
		'DocumentType' => 'ResourceDocumentType',
		'RedirectPage' => 'SiteTree', 
		'FeaturedImage' => 'Image'
	);

	private static $many_many = array(
		'Categories' => 'ResourceCategory'
	);

	private static $belongs_many_many = array(
		'ResourcePostPages' => 'ResourcesPostPage'
	);

	/**
	 * Set summary fields
	 * 
	 * @var array
	 */
	private static $summary_fields = array(
		'Title' => 'Title'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Resource';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Resources';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('ResourcesPage');
		$fields->removeByName('Categories');
		$fields->removeByName('ResourcePostPages');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder')
		);

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);

		$fields->insertBefore(
			TagField::create(
				'Categories',
				'Categories',
				ResourceCategory::get()->map('ID', 'Title')
			), 
			'DocumentTypeID'
		);

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create(
				'RedirectPageID', 
				'Choose a redirect page', 
				'SiteTree'
			)
		);

		$fields->dataFieldByName('Content')
			->setRows(20);

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('Resources/Images/');

		return $fields;
	}
}