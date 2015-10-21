<?php
class JobCategory extends DataObject {

	private static $db = array(
		'Title' => 'Varchar', 
		'URLSegment' => 'Varchar', 
		'Content' => 'Text', 
		'SortOrder' => 'Int'
	);

	private static $belongs_many_many = array(
		'Jobs' => 'Job'
	);

	private static $default_sort = 'SortOrder';

	private static $singular_name = 'Category';

	private static $plural_name = 'Categories';

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

	public function AbsoluteLink() {
		$productListingPage = JobListingPage::get()->First();

        return Controller::join_links(
            Director::absoluteBaseUrl(),
            $productListingPage->URLSegment,
            'category/' . $this->URLSegment
        );
    }    

}