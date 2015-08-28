<?php

if(class_exists("Widget")) {

	/**
	 * Represents the mailchimp search widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogSearchWidget extends Widget {
		
		/**
		 * Set title 
		 * 
		 * @var string
		 */
		private static $title = 'Search';

		/**
		 * Set CMS title
		 * 
		 * @var string
		 */
		private static $cmsTitle = 'Blog Search';

		/**
		 * Get CMS Fields
		 * 
		 * @return FieldList
		 */
		public function getCMSFields() {
			$fields = parent::getCMSFields();

			return $fields;
		}	
	}

	/**
	 * Controls the searching of blog posts
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogSearchWidget_Controller extends Widget_Controller {

		/**
		 * Set allowed actions
		 * 
		 * @var array
		 */
		private static $allowed_actions = array('BlogSearchForm');

		/**
		 * Initialise the controller
		 */
		public function init() {
			parent::init();
		}

		/**
		 * Get search form
		 *
		 * @return Form
		 */
		public function BlogSearchForm() {
			$fields = new FieldList(
				TextField::create('Keyword', false)
					->setAttribute('placeholder', 'Search the blog')
			);

			$formAction = FormAction::create('doSignUp')->setTitle('Sign Up');
			$formAction->useButtonTag = true;
			$actions = new FieldList($formAction);

			$required = new RequiredFields('Name', 'Email');

			$form = new Form($this, 'BlogMailchimpForm', $fields, $actions, $required);
			$form->addExtraClass('newsletter-form');
			$form->setTemplate('BlogMailchimpForm');

			return $form;
		}

		/**
		 * Search blog
		 * 
		 * @param  Array     $data
		 * @param  FieldList $fields
		 * @return FieldList
		 */
		public function doSearch(Array $data, FieldList $fields) {
			exit();
		}
	}
}