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
		'Summary' => 'Text', 
		'Content' => 'HTMLText'		
	);

	private static $has_many = array(
		'JobApplications' => 'JobApplication'
	);

	private static $many_many = array(
		'Categories' => 'JobCategory'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Job';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Jobs';

	/**
	 * Summary fields
	 * 
	 * @var array
	 */
	private static $summary_fields = array(
		'ConsultantReference', 
		'Title', 
		'Location', 
		'Salary'
	);

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
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
			$urlSegment = str_replace('/', '-', $urlSegment);
			$job = Job::get()->filter(array('URLSegment' => $urlSegment))->First();
			if ($job) {
				$this->URLSegment .= $urlSegment . '-' . substr(md5(microtime()),rand(0,26),5);
			} else {
				$this->URLSegment .= $urlSegment;
			}
		}		
	}

	/**
	 * Check if job entry is active
	 *
	 * @return  boolean
	 */
	public function IsActive() {
		$datenow = date('Y-m-d');

		$valid = true;
		if ($this->AdStartDate && (strtotime($datenow . ' 00:00:00') < strtotime($this->AdStartDate . " 00:00:00"))) {
			$valid = false;
		}

		if ($this->AdEndDate && (strtotime($datenow . ' 00:00:00') > strtotime($this->AdEndDate . " 00:00:00"))) {
			$valid = false;
		}

		return $valid;
	}

	/**
	 * RSS absolute link to job page
	 *
	 * @return  Request
	 */
	public function AbsoluteLink() {
		$jobPage = JobPage::get()->First();

        return Controller::join_links(
            $jobPage->Link(),
            'position',
            $this->URLSegment
        );
    }
}