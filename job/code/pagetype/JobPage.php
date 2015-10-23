<?php
/**
 * Represents the job page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobPage extends Page {

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/hiring-icon.png';

	/**
	 * show or hide the block builder tab
	 * 
	 * @return boolean
	 */
	public function canShowBlockBuilder() {
		return false;
	}	
}

/**
 * Controls the job page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobPage_Controller extends Page_Controller {

	/**
	 * Set allowed actions
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'category', 'feed', 'position', 'JobApplicationForm'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		RSSFeed::linkToFeed($this->Link() . "rss", "ACS Recruitment");

		$link = $this->Link() . 'category/';
		Requirements::customScript(<<<JS
			(function($) {
				$(document).ready(function(){
					$('#categories').change(function(){
						window.location = '$link' + $(this).val();
					});

					$('label.ss-uploadfield-fromcomputer').text("Hello World");
				});
			})(jQuery);			
JS
		);
	}

	/**
	 * Jobs feed
	 * 
	 * @return RSSFeed
	 */
	public function feed() {
        $rss = new RSSFeed(
            $this->getJobs(), 
            $this->Link(), 
            "ACS Recruitment", 
            null
        );
        $rss->setTemplate('JobsFeed');

        return $rss->outputToBrowser();
	}

	/**
	 * Job details page
	 * 
	 * @return SSViewer
	 */
	public function position() {
		$jobID = 0;
		if ($this->getJobDetails()) {
			$jobID = $this->getJobDetails()->ID;
		}

		Session::set('JobID', $jobID);

		return $this->renderWith(array('JobDetailsPage', 'Page'));
	}

	/**
	 * Job application form
	 *
	 * @return Form
	 */
	public function JobApplicationForm() {
		$cvUploadField =  UploadField::create('CV', 'Upload your cover letter')
				->setCanAttachExisting(false)
				->setCanPreviewFolder(false)
				->setConfig('replaceFile', false)
				->setFolderName('JobApplications/');
		$cvUploadField->setAllowedMaxFileNumber(1);
		$cvUploadField->relationAutoSetting = false;

		$coverLetterUploadField =  UploadField::create('CoveringLetter', 'Upload your CV')
				->setCanAttachExisting(false)
				->setCanPreviewFolder(false)
				->setConfig('replaceFile', false)
				->setFolderName('JobApplications/');
		$coverLetterUploadField->setAllowedMaxFileNumber(1);
		$coverLetterUploadField->relationAutoSetting = false;

        $fields = new FieldList(
            TextField::create('FirstName', false)
            	->setAttribute('placeholder', 'First name'), 
            TextField::create('Surname', false)
            	->setAttribute('placeholder', 'Surname'),
            EmailField::create('Email', false)
            	->setAttribute('placeholder', 'E-mail'), 
            TextField::create('Telephone', false)
            	->setAttribute('placeholder', 'Telephone'), 
            TextField::create('Address1', false)
            	->setAttribute('style', 'width:100%;')
            	->setAttribute('placeholder', 'Address'), 
            TextField::create('City', false)
            	->setAttribute('placeholder', 'City'), 
            TextField::create('PostCode', false)
            	->setAttribute('placeholder', 'Postcode'), 
            HiddenField::create('JobID', false, Session::get('JobID')), 
            $cvUploadField, 
            $coverLetterUploadField
        );

        $formAction = FormAction::create("doSubmitFormApplication")
        	->setTitle("Send");
        $formAction->useButtonTag = true;
        $actions = new FieldList($formAction);

        $required = new RequiredFields('FirstName');

        $form = new Form($this, 'JobApplicationForm', $fields, $actions, $required);
        $form->addExtraClass('col col1 contact-form');
        $form->setTemplate('JobApplicationForm');

        return $form;
	}

	public function doSubmitFormApplication(Array $data, Form $form) {
		$application = new JobApplication();
		$application->write();
		$form->saveInto($application);
		$application->write();
	}

	/**
	 * Get all jobs
	 * 
	 * @return DataList
	 */
	public function getJobs() {
		if ($this->getCurrentCategory()) {
			$category = JobCategory::get()->byID($this->getCurrentCategory()->ID);
			$jobs = $category->Jobs();
			$jobs = new PaginatedList($jobs, $this->request);
			$jobs->setPageLength(10);
			return $jobs;

		}

		$jobs = new PaginatedList(Job::get(), $this->request);
		$jobs->setPageLength(10);
		return $jobs;
	}

	/**
	 * Get the job details
	 * 
	 * @return Job
	 */
	public function getJobDetails() {
		if ($this->request->param('Action') == 'position') {
			return Job::get()->filter(array('URLSegment' => $this->request->param('ID')))->First();
		}

		return null;
	}	

	/**
	 * Get all categories
	 * 
	 * @return DataList
	 */
	public function getCategories() {
		return JobCategory::get();
	}

	/**
	 * Get selected category
	 * 
	 * @return JobCategory
	 */
	public function getCurrentCategory() {
		if ($this->request->param('Action') && $this->request->param('Action') == 'category' && $this->request->param('ID')) {
			return JobCategory::get()->filter(array('URLSegment' => $this->request->param('ID')))->First();
		}

		return null;
	}

	/**
	 * Get featured jobs
	 * 
	 * @return Datalist
	 */
	public function getFeaturedJobs() {
		return Job::get()->filter(array('FeaturedJob' => true));
	}	
}