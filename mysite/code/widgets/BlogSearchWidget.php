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
		 * Set description
		 * 
		 * @var string
		 */
		private static $description = 'Search blog posts';		

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
			$searchField = 	TextField::create('Keyword', false)
					->setAttribute('placeholder', 'Search');
			$keyword = Controller::curr()->request->getVar('Search');
			if ($keyword) {
				$searchField->setValue($keyword);
			}

			$fields = new FieldList($searchField);

			$formAction = FormAction::create('doSearch');
			$formAction->useButtonTag = true;
			$actions = new FieldList($formAction);

			$form = new Form($this, 'BlogSearchForm', $fields, $actions);
			$form->addExtraClass('blog-search');
			$form->setTemplate('BlogSearchForm');

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
			$this->redirect(Blog::get()->First()->Link() . '?Search=' . $data['Keyword']);
		}
	}
}