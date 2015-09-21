<?php
class ResourcesPage extends Blog {

	private static $has_many = array(
		'ResourcesCategories' => 'ResourceCategory', 
		'ResourcesDocumentTypes' => 'ResourceDocumentType'
	);

    /**
     * Set icon
     * 
     * @var string
     */
	private static $icon = 'resources/images/books-icon.png';

	/**
	 * Set allowed children
	 * 
	 * @var array
	 */
	private static $allowed_children = array(
		'ResourcesPostPage'
	);

	/**
	 * GEt CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeByName('Resources');
		$fields->removeByName('Authors');
		$fields->removeByName('FeaturedPosts');
		$fields->removeByName('Categorisation');
		$fields->fieldByName('Root')->fieldByName('ChildPages')->setTitle('Articles');

		$fields->dataFieldByName('ChildPages')
			->setTitle('Articles');

		$fields->addFieldToTab(
			'Root.Resources', 
			GridField::create(
				'ResourcesActionBox', 
				'Resources', 
				ResourcesActionBox::get(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		$fields->addFieldToTab(
			'Root.Categorisation', 
			GridField::create(
				'ResourcesCategories', 
				'Caregories', 
				$this->ResourcesCategories(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		$fields->addFieldToTab(
			'Root.Categorisation', 
			GridField::create(
				'ResourcesDocumentTypes', 
				'Document Types', 
				$this->ResourcesDocumentTypes(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function canShowBlockBuilder() {
		return false;
	}
}

/**
 * Controls the resources page 
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class ResourcesPage_Controller extends Blog_Controller {

	private static $allowed_actions = array(
		'LoadMore'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	public function LoadMore(SS_HTTPRequest $request) {
		exit();
	}

	/**
	 * Get all resources
	 * 
	 * @return DataList
	 */
	public function getResources() {
		$params = $this->request->getVars();

		$resources = ResourcesActionBox::get();
		if (isset($params['search']) && $params['search']) {

			if ($params['DocumentType']) {
				$resources = $resources->filter(array('DocumentType.ID' => $params['DocumentType']));
			}

			if ($params['Keyword']) {
				$resources = $resources->filterAny(array(
					'Title:PartialMatch' => $params['Keyword'], 
					'Content:PartialMatch' => $params['Keyword']
				));
			}

			return $resources;
		}

		return $resources;
	}

	/**
	 * Get param keyword
	 * 
	 * @return return string
	 */
	public function getParamKeyword() {
		$params = $this->request->getVars();
		if (isset($params['Keyword']) && $params['Keyword']) {
			return $params['Keyword'];
		}

		return null;
	}

	/**
	 * Get param document type
	 * 
	 * @return int
	 */
	public function getParamDocumentType() {
		$params = $this->request->getVars();
		if (isset($params['DocumentType']) && $params['DocumentType']) {
			return (int)$params['DocumentType'];
		}

		return null;
	}

	/**
	 * Get current selected document type filter
	 * 
	 * @return DocumentType
	 */
	public function getCurrentDocumentType() {
		$params = $this->request->getVars();
		if (isset($params['DocumentType']) && $params['DocumentType']) {
			return ResourceDocumentType::get()->byID($params['DocumentType']);	
		}

		return null;
	}

}