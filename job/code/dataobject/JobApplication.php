<?php
/**
 * Represents the job application
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class JobApplication extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'FirstName' => 'Varchar', 
		'Surname' => 'Varchar', 
		'Email' => 'Varchar', 
		'Telephone' => 'Varchar', 
		'Address1' => 'Text', 
		'City' => 'Varchar', 
		'PostCode' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Job' => 'Job', 
		'CoveringLetter' => 'File', 
		'CV' => 'File'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Application';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Applications';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		if ($this->ID) {
			$fields->dataFieldByName('CoveringLetter')
				->setFolderName('JobApplications/Application_' . $this->ID);
			$fields->dataFieldByName('CV')
				->setFolderName('JobApplications/Application_' . $this->ID);
		}

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
     * Get admin link to the job application
     *
     * @return string
     */
    public function AdminAbsoluteLink() {
		return Controller::join_links(
            Director::absoluteBaseUrl(),
            'admin/Jobs/JobApplication/EditForm/field/JobApplication/item',
            $this->ID . '/edit'
        );
	}	
}