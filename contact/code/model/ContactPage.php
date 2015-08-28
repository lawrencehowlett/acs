<?php
/**
 * Represents the contact page of the site
 *
 * @author Julius Caamic <julius@greebrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class ContactPage extends Page {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'TelephoneNumber' => 'Varchar', 
		'FaxNumber' => 'Varchar',
		'EmailAddress' => 'Varchar',
		'TelephoneNumber' => 'Varchar',
        'MailTo' => 'Varchar', 
        'MailFrom' => 'Varchar',
        'SubmitText' => 'HTMLText',
        'AdminSubmitText' => 'HTMLText'
	);

	/**
	 * Get has many 
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'RegionalOffices' => 'RegionalOffice'
	);

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'contact/images/contact-icon.png';

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields = $this->getOnSubissionFields($fields);
		$fields = $this->getRegionalOfficesFields($fields);
		$fields = $this->getConfigFields($fields);

		return $fields;
	}

	/**
	 * Get onsubmission fields
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getOnSubissionFields(&$fields) {
        $fields->addFieldToTab(
            'Root.OnSubmission',
            EmailField::create('MailFrom', 'Mail From')
        );

        $fields->addFieldToTab(
            'Root.OnSubmission',
            EmailField::create('MailTo', 'Mail To')
        );

        $fields->addFieldToTab(
            'Root.OnSubmission', 
            HTMLEditorField::create('SubmitText', 'Message to success form submission')
                ->setRows(20)
        );

        $fields->addFieldToTab(
            'Root.OnSubmission', 
            HTMLEditorField::create('AdminSubmitText', 'Auto reply message to admin')
                ->setRows(20)
        );        

		return $fields;
	}

	/**
	 * Get regional offices fields
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getRegionalOfficesFields(&$fields) {
		$fields->addFieldToTab(
			'Root.RegionalOffices',
			GridField::create(
				'RegionalOffices', 
				'Regional Offices', 
				$this->RegionalOffices(), 
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	/**
	 * Get config fields
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getConfigFields(&$fields) {
		$fields->addFieldToTab(
			'Root.Config', 
			TextField::create('TelephoneNumber', 'Telephone Number')
		);

		$fields->addFieldToTab(
			'Root.Config', 
			TextField::create('FaxNumber', 'Fax Number')
		);

		$fields->addFieldToTab(
			'Root.Config', 
			EmailField::create('EmailAddress', 'Email Address')
		);

		return $fields;
	}
}

/**
 * Represents the contact page of the site
 *
 * @author Julius Caamic <julius@greebrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class ContactPage_Controller extends Page_Controller {
	
	/**
	 * Set allowed actions
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'ContactForm'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	/**
	 * Get the contact form
	 *
	 * @return Form
	 */
	public function ContactForm() {
        $fields = new FieldList(
        	TextField::create('CompanyName', false)
        		->setAttribute('placeholder', 'Company name'), 
        	TextField::create('Name', false)
        		->setAttribute('placeholder', 'Your name'), 
        	EmailField::create('Email', false)
        		->setAttribute('placeholder', 'E-mail'), 
        	TextField::create('TelephoneNumber', false)
        		->setAttribute('placeholder', 'Telephone'), 
        	TextareaField::create('Message', false)
        		->setAttribute('placeholder', 'Message')
        );

        $actionButton = FormAction::create('doContact')->setTitle('Submit message')->addExtraClass('submit');
        $actionButton->useButtonTag = true;
        $action = new FieldList($actionButton);

        $validator = new RequiredFields(array('CompanyName', 'Name', 'Email', 'TelephoneNumber', 'Message'));

        $form = new Form($this, 'ContactForm', $fields, $action, $validator);
        $form->addExtraClass('col col2 contact-form');
        $form->setTemplate('ContactForm');

        return $form;		
	}

	public function doContact($data, $form) {
        $email = new Email(
            $this->MailFrom,
            $data['Email'],
            'Thanks for contacting ACS'
        );
        $email->setTemplate('CustomerEnquiryThanks');
        $email->populateTemplate($data);
        $email->send();

        $emailData = array(
            '$Name' => $data['Name'],
            '$Company' => $data['Company'],
            '$Email' => $data['Email'],
            '$TelephoneNumber' => $data['TelephoneNumber'],
            '$Message' => $data['Message']
        );
        $adminMessage = str_replace(array_keys($emailData), array_values($emailData), $this->AdminSubmitText);

        $saleEmail = new Email(
            $this->MailFrom,
            $this->MailTo,
            'Enquiry request from ' . $data['Name'], 
            $adminMessage
        );
        $saleEmail->send();

        $this->redirect($this->Link("?success=1"));
	}

    /**
     * Check success email contact send
     *
     * @return boolean
     */
    public function Success() {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }	
}