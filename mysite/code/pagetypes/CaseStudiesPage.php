<?php
/**
 * Represents the case studies page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudiesPage extends Blog {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/case-icon.png';

	/**
	 * Set allowed children
	 * 
	 * @var string
	 */
	private static $allowed_children = array('CaseStudyPage');

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeByName('Authors');

		$fields->fieldByName('Root')
			->fieldByName('ChildPages')
			->setTitle('Case Studies');

		$source = CaseStudyPage::get();
		$list = $fields->dataFieldByName('ChildPages')
			->setList($source);

		$fields->dataFieldByName('ChildPages')
			->getConfig()
			->addComponent(new GridFieldSortableRows('SortOrder'));

		$fields->dataFieldByName('ChildPages')
			->setTitle('Case Studies')
			->getConfig()
			->getComponentByType('GridFieldPaginator')
			->setItemsPerPage(100);

		return $fields;
	}

	public function getBlogPosts() {
		$caseStudyPage = CaseStudyPage::get()->filter("ParentID", $this->ID);
		return $caseStudyPage;
	}	
}

/**
 * Controls the case studies page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudiesPage_Controller extends Blog_Controller {
	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}
}