<?php
class JobCategory extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar', 
		'URLSegment' => 'Varchar', 
		'Content' => 'Text', 
		'SortOrder' => 'Int'
	);

	/**
	 * Set belongs many many
	 * 
	 * @var array
	 */
	private static $belongs_many_many = array(
		'Jobs' => 'Job'
	);

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Category';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Categories';

	/**
	 * Get cms fields
	 * 
	 * @return Fieldlist
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Jobs');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'URLSegment')
		);

		return $fields;
	}

	/**
	 * Check can create permission 
	 * 
	 * @param  Member $member
	 * @return Boolean
	 */
	public function canCreate($member = NULL) {
		if (Permission::check('ADMIN') || Permission::check('CMS_ACCESS_JobAdmin')) {
			return true;
		}

		return false;
	}

	/**
	 * Check can edit permission 
	 * 
	 * @param  Member $member
	 * @return Boolean
	 */
	public function canEdit($member = NULL) {
		if (Permission::check('ADMIN') || Permission::check('CMS_ACCESS_JobAdmin')) {
			return true;
		}

		return false;
	}

	/**
	 * Check can delete permission 
	 * 
	 * @param  Member $member
	 * @return Boolean
	 */
	public function canDelete($member = NULL) {
		if (Permission::check('ADMIN') || Permission::check('CMS_ACCESS_JobAdmin')) {
			return true;
		}

		return false;
	}

	/**
	 * Check can view permission 
	 * 
	 * @param  Member $member
	 * @return Boolean
	 */
	public function canView($member = NULL) {
		if (Permission::check('ADMIN') || Permission::check('CMS_ACCESS_JobAdmin')) {
			return true;
		}

		return false;
	}	

	/**
	 * Hook to on before write
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if (!$this->URLSegment) {
			$urlSegment = str_replace(' ', '-', strtolower($this->Title));
			$category = JobCategory::get()->filter(array('URLSegment' => $urlSegment))->First();
			if ($category) {
				$this->URLSegment .= $urlSegment . '-' . substr(md5(microtime()),rand(0,26),5);
			} else {
				$this->URLSegment .= $urlSegment;
			}
		}		
	}

	/**
	 * RSS absolute link to category page job listing
	 *
	 * @return  Request
	 */
	public function AbsoluteLink() {
		$productListingPage = JobListingPage::get()->First();

        return Controller::join_links(
            Director::absoluteBaseUrl(),
            $productListingPage->URLSegment,
            'category/' . $this->URLSegment
        );
    }    

}