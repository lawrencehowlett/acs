<?php
if(class_exists("Widget")) {

	/**
	 * Represents the welcome message widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogWelcomeWidget extends Widget {
		
		private static $db = array(
			'Title' => 'Text', 
			'Text' => 'HTMLText'
		);

		private static $has_one = array(
			'FeaturedImage' => 'Image'
		);

		/**
		 * Set title 
		 * 
		 * @var string
		 */
		private static $title = 'Welcome';

		/**
		 * Set CMS title
		 * 
		 * @var string
		 */
		private static $cmsTitle = 'Blog Welcome';

		/**
		 * Get CMS Fields
		 * 
		 * @return FieldList
		 */
		public function getCMSFields() {
			$fields = parent::getCMSFields();

			$fields->push(
				HTMLEditorField::create('Text', 'Content')
					->setRows(20)
			);

			$fields->push(
				UploadField::create('FeaturedImage', 'Image')
					->setFolderName('Blog/Welcome/Image')
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
	class BlogWelcomeWidget_Controller extends Widget_Controller {

		public function init() {
			parent::init();
		}

	}
}
