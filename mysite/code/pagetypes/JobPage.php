<?php
/**
 * Represents the job details page
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class JobPage extends Page {

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/hiring-icon.png';
}

/**
 * Controls the job details page
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class JobPage_Controller extends Page_Controller {

	/**
	 * Set allowed action
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'job', 'JobApplicationForm'
	);

	/**
	 * Set url handlers
	 * 
	 * @var array
	 */
	private static $url_handlers = array(
		'$Title' => 'job'
	);

	/**
	 * Initialise the controler
	 */
	public function init() {
		parent::init();
	}

	public function JobApplicationForm() {
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
            	->setAttribute('placeholder', 'Address'), 
            TextField::create('City', false)
            	->setAttribute('placeholder', 'City'), 
            TextField::create('Postcode', false)
            	->setAttribute('placeholder', 'Postcode'), 
			FileAttachmentField::create('CoverLetter', 'Upload your cover letter')
				->setThumbnailHeight(180)
				->setThumbnailWidth(180)
				->setAutoProcessQueue(false)
				->setMaxFilesize(5)
				->setAcceptedFiles(array('.pdf','.doc','.docx'))
				->setAttribute('style', 'width:100%;'), 
			FileAttachmentField::create('CV', 'Upload your CV')
				->setThumbnailHeight(180)
				->setThumbnailWidth(180)
				->setAutoProcessQueue(false)
				->setMaxFilesize(5)
				->setAcceptedFiles(array('.pdf','.doc','.docx'))
				->setAttribute('style', 'width:100%;')
        );

        $formAction = FormAction::create("doSubmitFormApplication")
        	->setTitle("Send");
        $formAction->useButtonTag = true;
        $actions = new FieldList($formAction);

        $required = new RequiredFields('FirstName');

        $form = new Form($this, 'JobApplicationForm', $fields, $actions, $required);
        $form->addExtraClass('col col2 contact-form');
        $form->setTemplate('JobApplicationForm');

        return $form;
	}

	public function doSubmitFormApplication($data, Form $form) {
		exit();
	}

	/**
	 * Set the title to as the job title
	 *
	 * @return  string
	 */
	public function Title() {
		if ($this->getJobDetails()) {
			return $this->getJobDetails()->Title;
		}

		return null;
	}

	public function job(SS_HTTPRequest $request) {

		if ($request->param('Action') == 'JobApplicationForm') {
			return $this->renderWith(array('JobPage','Page'));
		}

		if (!$this->getJobDetails()) {
			$this->redirect(JobListingPage::get()->First()->Link());
		}

		return $this->renderWith(array('JobPage','Page'));
	}

	/**
	 * Get the job details
	 * 
	 * @return Job
	 */
	public function getJobDetails() {
		$jobURLSegment = Convert::raw2sql($this->request->param('Action'));

		return Job::get()->filter(array('URLSegment' => $jobURLSegment))->First();
	}

	/**
	 * Get the job listing page
	 * 
	 * @return Page
	 */
	public function getJobListingPage() {
		return JobListingPage::get()->First();
	}

	/**
	 * Get all job categories
	 * 
	 * @return DataList
	 */
	public function getCategories() {
		return JobCategory::get();
	}

	/**
	 * Check current category
	 * 
	 * @param [type] $id [description]
	 */
	public function IsCurrentCategory($id) {
		if ($this->getJobDetails()) {
			$categories = $this->getJobDetails()->Categories();
			$categories = $categories->column('ID');
			if (in_array($id, $categories)) {
				return 'active';
			}
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