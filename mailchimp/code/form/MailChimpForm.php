<?php
/**
 * Mail chimp form that will be inserted to page content
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2014, Julius Caamic
 */
class MailChimpForm extends Form {

	/**
	 * Create the mailchimp subscription 
	 * 
	 * @param Controller $controller
	 * @param string $name
	 */
	public function __construct($controller, $name, $extendedFields = null, $listCode=null) {

		$fields = new FieldList(
			TextField::create('Name', 'Name')
				->setAttribute('required', 'required')
				->setAttribute('placeholder', 'Your name'),
			EmailField::create('Email', 'Email')
				->setAttribute('required', 'required')
				->setAttribute('placeholder', 'Your e-mail')
		);

		if ($extendedFields) {
			$fields->merge($extendedFields);
		}

		$this->extend('updateFields', $fields);
		
		$formAction = FormAction::create('subscribe')->setTitle('Sign Up');
		$formAction->useButtonTag = true;
		$actions = new FieldList($formAction);

		$validator = new RequiredFields(
			'Email'
		);

		Requirements::css('mailchimp/css/mailchimp.css');
		Requirements::javascript('mailchimp/javascript/jquery.mailchimp.js');

		parent::__construct($controller, $name, $fields, $actions, $validator);
	}

	/**
	 * Handles the action when subscribe is being done
	 * 
	 * @param  Array  $data
	 * @param  Form   $form
	 */
	public function subscribe(Array $data, Form $form) {
		$settings = SiteConfig::current_site_config();

		$MailChimp = new \Drewm\MailChimp($settings->APIKey);
		
		$apiData = array(
			'id'                => $settings->MailChimpList()->filter(array('Code' => $data['ListCode']))->First()->ListID,
			'email'             => array('email' => $data['Email']),
			'merge_vars'        => array('FName' => $data['Name']),
			'double_optin'      => false,
			'update_existing'   => false,
			'replace_interests' => false,
			'send_welcome'      => false,
		);

		$this->extend('updateAPIData', $apiData);

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

	/**
	 * Gets the mailchimp newsletter form
	 * 
	 * @param Array $arguments
	 */
	public static function MailChimpShortcodeHandler($arguments) {
		$form = new MailChimpForm(Controller::curr(), 'MailChimpForm', $arguments);

		return $form->forTemplate();
	}
}

/**
 * Represents the controller of the Mailchimp Form
 *
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2014, Julius Caamic
 */
class MailChimpForm_Controller extends Controller {

	/**
	 * Calls the mailchimp form
	 */
	public function index() {
		return new MailChimpForm($this, 'MailChimpForm');
	}
}