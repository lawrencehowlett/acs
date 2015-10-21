<?php
class Job extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'URLSegment' => 'Text', 
		'Salary' => 'Varchar', 
		'Location' => 'Text', 
		'StartDate' => 'Date', 
		'EndDate' => 'Date', 
		'AdStartDate' => 'Date', 
		'AdEndDate' => 'Date', 
		'ApplicationEmail' => 'Varchar',
		'ConsultantReference' => 'Text', 
		'FeaturedJob' => 'Boolean', 
		'Summary' => 'HTMLText', 
		'Content' => 'HTMLText'		
	);

	private static $many_many = array(
		'Categories' => 'JobCategory', 
		'JobApplications' => 'JobApplication'
	);

	private static $singular_name = 'Job';

	private static $plural_name = 'Jobs';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Categories');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('URLSegment')
		);

		$fields->replaceField(
			'Title', 
			TextField::create('Title', 'Title')
		);

		$fields->replaceField(
			'ConsultantReference', 
			TextField::create('ConsultantReference', 'Consultant Reference')
		);

		$fields->replaceField(
			'Location', 
			TextField::create('Location', 'Location')
				->setRightTitle('i.e London City')
		);

		$fields->dataFieldByName('Summary')
			->setRows(20);
		$fields->dataFieldByName('Content')
			->setRows(20)
			->setTitle('Job Information');

		if ($this->ID) {
			$fields->insertBefore(
				TagField::create(
					'Categories',
					'Categories',
					JobCategory::get()->map(),
					$this->Categories()->map()
				), 
				'FeaturedJob'	
			);			
		}

		$fields->dataFieldByName('FeaturedJob')
			->setTitle('Assign to featured job widget?');

		$fields->dataFieldByName('StartDate')
			->setConfig('dateformat', 'dd/MM/yyyy')
			->setConfig('showcalendar', true);
		$fields->dataFieldByName('EndDate')
			->setConfig('dateformat', 'dd/MM/yyyy')
			->setConfig('showcalendar', true);
		$fields->dataFieldByName('AdStartDate')
			->setConfig('dateformat', 'dd/MM/yyyy')
			->setConfig('showcalendar', true)
			->setRightTitle('The date this job should start being displayed on the site. To start displaying immediately, leave blank.');
		$fields->dataFieldByName('AdEndDate')
			->setConfig('dateformat', 'dd/MM/yyyy')
			->setConfig('showcalendar', true)
			->setRightTitle('The date this job should stop being displayed on the site. To display indefinitely, leave blank.');

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
	 * Hook on before write
	 */
	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if (!$this->URLSegment) {
			$urlSegment = str_replace(' ', '-', strtolower($this->Title));
			$job = Job::get()->filter(array('URLSegment' => $urlSegment))->First();
			if ($job) {
				$this->URLSegment .= $urlSegment . '-' . substr(md5(microtime()),rand(0,26),5);
			} else {
				$this->URLSegment .= $urlSegment;
			}
		}		
	}

	/**
	 * RSS absolute link to job page
	 *
	 * @return  Request
	 */
	public function AbsoluteLink() {
		$jobPage = JobPage::get()->First();

        return Controller::join_links(
            Director::absoluteBaseUrl(),
            $jobPage->URLSegment,
            $this->URLSegment
        );
    }
}