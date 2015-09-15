<?php
/**
 * Represents the standard landing page
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class Page extends SiteTree {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Description' => 'HTMLText'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Banner' => 'Image'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'ActionBoxes' => 'ActionBox'
	);

	/**
	 * Set many many extra fields
	 * 
	 * @var array
	 */
    public static $many_many_extraFields=array(
        'ActionBoxes' => array(
            'SortColumn' => 'Int'
        )
    );		

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		if ($this->ClassName == 'Page') {
			$fields->removeByName('Widgets');
		}

		$fields->insertBefore(
			UploadField::create('Banner', 'Banner')
				->setFolderName('Banners/'),
			'Content'
		);

		$fields->insertBefore(
			ToggleCompositeField::create(
				'CustomHeaderImage', 
				'Attach A Header Description', 
				array(
					HTMLEditorField::create('Description', 'Header description')->setRows(20)
				)
			),
			'Content'
		);

		$fields->addFieldToTab(
			'Root.Teasers', 
			GridField::create(
				'ActionBoxes', 
				'Teasers', 
				$this->ActionBoxes(), 
				GridFieldConfig_RelationEditor::create()
					->addComponent(new GridFieldSortableRows('SortColumn'))
			)
		);

		return $fields;
	}

	public function canShowBlockBuilder() {
		return true;
	}

    public function ActionBoxes() {
        return $this->getManyManyComponents('ActionBoxes')->sort('SortColumn');
    }
}

/**
 * controls the page class
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class Page_Controller extends ContentController {

	/**
	 * Set allowed actions
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'SpecialistsForm', 'SearchForm'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		Requirements::css('themes/acs/css/main.css');
		Requirements::css('themes/acs/css/jquery.mCustomScrollbar.min.css');
		Requirements::customCSS(<<<CSS
			form#MemberLoginForm_LoginForm fieldset, form#MemberLoginForm_LostPasswordForm fieldset {border: none; padding: 0;}
			form#MemberLoginForm_LoginForm p#MemberLoginForm_LoginForm_error {
				background: #f2dede;
				border-color: #ebccd1;
				color: #a94442;
				padding:10px;
			}
			form#MemberLoginForm_LoginForm input[type="submit"], form#MemberLoginForm_LostPasswordForm input[type="submit"] {
				background: #f6af16 none repeat scroll 0 0;
				border: medium none;
				color: #fff;
				cursor: pointer;
				font: 700 18px/75px "Prelo",sans-serif;
				float: right;
				padding: 0;
				text-align: center;
				text-transform: uppercase;
				transition: all 0.3s ease 0s;
				width:50%;
			}

			form#MemberLoginForm_LostPasswordForm input[type="submit"] {margin-top:10px;}
CSS
		);

		Requirements::javascript('https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false');
		Requirements::javascript('themes/acs/js/min.js');
	}

	/**
	 * Extend the search form to add the extra class
	 * 
	 * @return Form
	 */
	public function SearchForm() {
		$form = parent::SearchForm();
		$form->addExtraClass('searchform');

		$fields = $form->Fields();
		$fields->dataFieldByName('Search')
			->setAttribute('placeholder', 'Search')
			->setValue('');

		return $form;
	}

	/**
	 * Get specialist form
	 *
	 * @return Form
	 */
	public function SpecialistsForm() {
		$fields = new FieldList(
			TextField::create('CompanyName', false)
				->setAttribute('placeholder', 'Company Name'), 
			EmailField::create('Email', false)
				->setAttribute('placeholder', 'E-mail'), 
			TextField::create('Name', false)
				->setAttribute('placeholder', 'Name'), 
			TextField::create('Telephone', false)
				->setAttribute('placeholder', 'Telephone'), 
			TextField::create('BestTimeToCall', false)
				->addExtraClass('double')
				->setAttribute('placeholder', 'Best time to call?'), 
			CheckboxField::create('Newsletter', 'Yes, I want your monthly newsletter with great tips to improve my business')
		);

		$formAction = FormAction::create('doCallSpecialist')
			->setTitle($this->getCallSpecialistBlock()->ButtonText);
		$formAction->useButtonTag = true;
		$actions = new FieldList($formAction);

		$required = new RequiredFields('CompanyName', 'Email', 'Name', 'Telephone');

		$form = new Form($this, 'SpecialistsForm', $fields, $actions, $required);
		$form->addExtraClass('contact-specialist cf');
		$form->setTemplate('SpecialistsForm');

		return $form;
	}

	/**
	 * Submit call specialist form
	 * 
	 * @param  Array  $data
	 * @param  Form   $form
	 * @return SS_HTTPRequest
	 */
	public function doCallSpecialist(Array $data, Form $form) {
		$callSpecialistBlock = $this->getCallSpecialistBlock();
		$emailLead = new Email(
			$callSpecialistBlock->MailFrom,
			$data['Email'], 
			$callSpecialistBlock->MailToSubject,
			$callSpecialistBlock->MailToBody
		);
		$emailLead->send();

        $arrData = array(
            '$CompanyName' => $data['CompanyName'],
            '$Name' => $data['Name'],
            '$Email' => $data['Email'],
            '$Telephone' => $data['Telephone'],
            '$BestTimeToCall' => $data['BestTimeToCall']
        );
        $adminEmailMessage = str_replace(array_keys($arrData), array_values($arrData), $callSpecialistBlock->MailToAdminBody);

		$adminGroup = Group::get()->filter(array('Code' => 'administrators'))->First();
		if ($adminGroup) {
			$admins = $adminGroup->DirectMembers();
			foreach ($admins as $admin) {
				$emailAdmin = new Email(
					$callSpecialistBlock->MailFrom, 
					$admin->Email, 
					'Call request from ' . $data['CompanyName'],
					$adminEmailMessage,
					null,
					null
				);
				$emailAdmin->addCustomHeader('Reply-To', $data['Email']);
				$emailAdmin->send();
			}
		}		

		if (isset($data['Newsletter'])) {
			$settings = SiteConfig::current_site_config();
			$MailChimp = new \Drewm\MailChimp($settings->APIKey);

			$newsletterApiData = array(
				'id'                => $settings->MailChimpList()->filter(array('Code' => 'NEWSLETTER'))->First()->ListID,
				'email'             => array('email' => $data['Email']),
				'merge_vars'        => array('Name' => $data['Name']),
				'double_optin'      => false,
				'update_existing'   => true,
				'replace_interests' => false,
				'send_welcome'      => false,
			);

			$newsLetterResult = $MailChimp->call('lists/subscribe', $newsletterApiData);
		}

		$this->redirect($callSpecialistBlock->RedirectPage()->Link());
	}

	/**
	 * Get call specialist block
	 * 
	 * @return BlockWidget
	 */
	public function getCallSpecialistBlock() {
		$widgets = $this->Widgets();
		if ($widgets) {
			foreach ($widgets as $widget) {
				if ($widget->ClassName == 'BlockWidgetSpeakToSpecialist') {
					return $widget;
				}
			}
		}

		return null;
	}

	/**
	 * Get the correct index of the list
	 * 
	 * @return int
	 */
	public function getListIndex($number) {
		if ($number) {
			return $number - 1;
		}

		return 0;
	}

	public function getAllResourcesPage() {
		return ResourcesPage::get()->First();
	}

	/**
	 * Check if page is a login page
	 *
	 * @return boolean
	 */
	public function getIsAdminLoginPage() {
		if ($this->owner->URLSegment == 'Security') {
			return true;
		}

		return false;
	}	
}
