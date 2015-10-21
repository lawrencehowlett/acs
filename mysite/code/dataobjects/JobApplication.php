<?php
class JobApplication extends DataObject {

	private static $db = array(
		'FirstName' => 'Varchar', 
		'Surname' => 'Varchar', 
		'Email' => 'Varchar', 
		'Telephone' => 'Varchar', 
		'Address1' => 'Text', 
		'Address2' => 'Text', 
		'City' => 'Varchar', 
		'PostCode' => 'Varchar'
	);

	private static $has_one = array(
		'CoveringLetter' => 'File', 
		'CV' => 'File'
	);

	private static $singular_name = 'Application';

	private static $plural_name = 'Applications';

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
}