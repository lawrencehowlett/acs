<?php
/**
 * Represents the job page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobPage extends Page {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'SubmitText' => 'HTMLText'
	);

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/hiring-icon.png';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldToTab(
			'Root.Submission', 
			HTMLEditorField::create('SubmitText', 'Text on submission')
				->setRows(20)
		);

		return $fields;
	}

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
		'category', 
		'feed', 
		'position', 
		'submission', 
		'JobApplicationForm'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		RSSFeed::linkToFeed($this->Link() . "rss", "ACS Recruitment");

		Requirements::customCSS(<<<CSS
			#Form_JobApplicationForm_CV, #Form_JobApplicationForm_CoveringLetter {width: 100%;}
CSS
		);
		Requirements::block('framework/thirdparty/jquery/jquery.js');
		$link = $this->Link() . 'category/';
		Requirements::customScript(<<<JS
			(function($) {
				$(document).ready(function(){
					$('#categories').change(function(){
						window.location = '$link' + $(this).val();
					});
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
			if (!$this->getJobDetails()->IsActive()) {
				Controller::redirect($this->Link());
			}
			$jobID = $this->getJobDetails()->ID;
		}

		Session::set('JobID', $jobID);

		return $this->renderWith(array('JobDetailsPage', 'Page'));
	}

	/**
	 * Job submission
	 * 
	 * @return SSViewer
	 */
	public function submission() {
		return $this->renderWith(array('JobSubmission', 'Page'));
	}

	/**
	 * Job application form
	 *
	 * @return Form
	 */
	public function JobApplicationForm() {
		$cvUploadField =  UploadField::create('CV', 'Upload your CV')
				->setCanAttachExisting(false)
				->setCanPreviewFolder(false)
				->setConfig('replaceFile', false)
				->setFolderName('JobApplications/');
		$cvUploadField->setAllowedMaxFileNumber(1);
		$cvUploadField->relationAutoSetting = false;

		$coverLetterUploadField =  UploadField::create('CoveringLetter', 'Upload your cover letter')
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
            $coverLetterUploadField, 
            $cvUploadField
        );

        $formAction = FormAction::create("doSubmitFormApplication")
        	->setTitle("Send");
        $formAction->useButtonTag = true;
        $actions = new FieldList($formAction);

        $required = new RequiredFields(
        	'FirstName', 
        	'Surname', 
        	'Email', 
        	'Telephone', 
        	'Address1', 
        	'City', 
        	'PostCode'
        );

        $form = new Form($this, 'JobApplicationForm', $fields, $actions, $required);
        $form->addExtraClass('col col2 contact-form');
        $form->setTemplate('JobApplicationForm');

        return $form;
	}

	/**
	 * Submit form application
	 * 
	 * @param  Array  $data
	 * @param  Form   $form
	 * @return SS_HTTPRequest
	 */
	public function doSubmitFormApplication(Array $data, Form $form) {
		$application = new JobApplication();
		$application->write();

		$form->Fields()->dataFieldByName('CoveringLetter')
			->setFolderName('JobApplications/Application_' . $application->ID);
		$form->Fields()->dataFieldByName('CV')
			->setFolderName('JobApplications/Application_' . $application->ID);

		$form->saveInto($application);
		$application->write();

		$jobID = Session::get('JobID');
		if ($jobID) {
			$job = Job::get()->byID($jobID);
			if ($job) {
				$siteConfig = SiteConfig::current_site_config();
				$recipient = ($job->ApplicationEmail) ? $job->ApplicationEmail : $siteConfig->JobAdminEmail;
		        $email = new Email(
		            'info@acs365.co.uk',
		            $recipient, 
		            'Job application for ' . $job->Title . ' position'
		        );
		        $email->setTemplate('JobApplicationEmail');
		        $email->populateTemplate($data);
		        $email->populateTemplate($job);
		        $email->populateTemplate(array(
		        	'AdminLink' => $application->AdminAbsoluteLink()
		        ));
		        $email->send();

				Controller::curr()->redirect($this->Link("/submission/" . $job->URLSegment));
			} else {
				Controller::curr()->redirectBack();
			}
		} else {
			Controller::curr()->redirectBack();
		}
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
		if ($this->request->param('Action') == 'position' || $this->request->param('Action') == 'submission') {
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