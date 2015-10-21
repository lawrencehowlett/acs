<?php
/**
 * Represents the job listing page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobListingPage extends Page {

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/listing-icon.png';

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
 * Controls the job listing page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobListingPage_Controller extends Page_Controller {

	/**
	 * Set allowed actions
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'category', 'feed'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		RSSFeed::linkToFeed($this->Link() . "rss", "10 Most Recently Updated Pages");

		$link = $this->URLSegment;
		Requirements::customScript(<<<JS
			(function($) {
				$(document).ready(function(){
					$('#categories').change(function(){
						window.location = '$link/category/' + $(this).val();
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
	 * Get the job details page
	 * 
	 * @return Page
	 */
	public function getJobDetailsPage() {
		return JobPage::get()->First();
	}
}