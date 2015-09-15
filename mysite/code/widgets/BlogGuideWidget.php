<?php
if(class_exists("Widget")) {

	/**
	 * Represents the welcome message widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogGuideWidget extends Widget {
		
		/**
		 * Set properties
		 * 
		 * @var array
		 */
		private static $db = array(
			'Title' => 'Text', 
			'SubTitle' => 'Text', 
			'Text' => 'HTMLText', 
			'ButtonText' => 'Varchar'
		);

		/**
		 * Set has one
		 * 
		 * @var array
		 */
		private static $has_one = array(
			'RedirectPage' => 'SiteTree'
		);

		/**
		 * Set title 
		 * 
		 * @var string
		 */
		private static $title = 'Guide';

		/**
		 * Set CMS title
		 * 
		 * @var string
		 */
		private static $cmsTitle = 'Guide';

		/**
		 * Set description
		 * 
		 * @var string
		 */
		private static $description = 'A call to action guide on sidebar';

		/**
		 * Get CMS Fields
		 * 
		 * @return FieldList
		 */
		public function getCMSFields() {
			$fields = parent::getCMSFields();

			$fields->push(
				TextField::create('SubTitle', 'Subtitle')
			);

			$fields->push(
				HTMLEditorField::create('Text', 'Content')
					->setRows(20)
			);

			$fields->push(
				TextField::create('ButtonText', 'Button text')
			);

			$fields->push(
				TreeDropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
			);

			return $fields;
		}	
	}

	/**
	 * Controls the newsletter blog widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogGuideWidget_Controller extends Widget_Controller {

		/**
		 * Initialise the controller
		 */
		public function init() {
			parent::init();
		}
	}
}
