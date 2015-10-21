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
		'job'
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

	/**
	 * Set the title to as the job title
	 *
	 * @return  string
	 */
	public function Title() {
		return $this->getJobDetails()->Title;
	}

	public function job(SS_HTTPRequest $request) {

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
		$categories = $this->getJobDetails()->Categories();
		$categories = $categories->column('ID');
		if (in_array($id, $categories)) {
			return 'active';
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