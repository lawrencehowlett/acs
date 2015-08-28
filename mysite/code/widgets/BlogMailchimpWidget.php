<?php

if(class_exists("Widget")) {

	/**
	 * Represents the mailchimp newsletter blog widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogMailchimpWidget extends Widget {
		
		/**
		 * Set title 
		 * 
		 * @var string
		 */
		private static $title = 'Newslettter';

		/**
		 * Set CMS title
		 * 
		 * @var string
		 */
		private static $cmsTitle = 'Blog Newsletter';

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
	 * Controls the newsletter blog widget
	 * 
	 * @author Julius <julius@greenbrainer.com>
	 * @copyright Copyright (c) 2015, Julius 
	 */
	class BlogMailchimpWidget_Controller extends Widget_Controller {

		/**
		 * Set allowed actions
		 * 
		 * @var array
		 */
		private static $allowed_actions = array('BlogMailchimpForm');

		public function init() {
			parent::init();

			Requirements::customCSS(<<<CSS
				form#Form_BlogMailchimpForm p.message {margin-bottom:10px;}
				form#Form_BlogMailchimpForm p.bad {
				    background: none repeat scroll 0 0 #f2dede;
				    border-color: #ebccd1;
				    color: #a94442;
				    padding: 15px;	
				}
				form#Form_BlogMailchimpForm p.good {
					background: none repeat scroll 0 0 #dff0d8;
				    border: 1px solid #d6e9c6;
				    color: #3c763d;
				    padding: 15px;	
				}
CSS
			);
			Requirements::javascript('mailchimp/javascript/jquery.mailchimp.js');
			Requirements::customScript(<<<JS
				(function($) {
				    $(document).ready(function(){
				        $('form#Form_BlogMailchimpForm').mailchimp();
				    })
				})(jQuery);				
JS
			);
		}

		/**
		 * Get mailchimp form
		 *
		 * @return Form
		 */
		public function BlogMailchimpForm() {
			$fields = new FieldList(
				TextField::create('Name', false)
					->setAttribute('placeholder', 'Your name'), 
				EmailField::create('Email', false)
					->setAttribute('placeholder', 'Your e-mail')
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
		 * Submit to information to mailchimp api
		 * 
		 * @param  Array     $data
		 * @param  FieldList $fields
		 * @return FieldList
		 */
		public function doSignUp(Array $data, FieldList $fields) {
			$settings = SiteConfig::current_site_config();

			$MailChimp = new \Drewm\MailChimp($settings->APIKey);
			
			$apiData = array(
				'id'                => $settings->MailChimpList()->filter(array('Code' => 'NEWSLETTER'))->First()->ListID,
				'email'             => array('email' => $data['Email']),
				'merge_vars'        => array('Name' => $data['Name']),
				'double_optin'      => false,
				'update_existing'   => false,
				'replace_interests' => false,
				'send_welcome'      => false,
			);

			$result = $MailChimp->call('lists/subscribe', $apiData);

			if (Director::is_ajax()) {
				if (isset($result['status']) && $result['status'] == 'error') {
					if ($result['code'] == 214) {
						return json_encode(array(
							'success' => false,
							'message' => $data['Email'] . ' is already subscribed'
						));
					} else {
						return json_encode(array(
							'success' => false,
							'message' => $result['error']
						));

					}
				} else {
					return json_encode(array(
						'success' => true,
						'message' => 'Thank you for subscribing to our newsletter'
					));
				}
			} else {
				if (isset($result['status']) && $result['status'] == 'error') {
						if ($result['code'] == 214) {
						$this->sessionMessage($data['Email'] . ' is already subscribed.', 'bad');
					} else {
						$this->sessionMessage($result['error'], 'bad');
					}
				} else {
					$this->sessionMessage('Thank you for subscribing to our newsletter', 'good');
				}

				Controller::curr()->redirectBack();
			}			
		}
	}
}