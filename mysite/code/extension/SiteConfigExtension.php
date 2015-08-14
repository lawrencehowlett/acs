<?php
/**
 * Extension to Site Config
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class SiteConfig_Extension extends DataExtension {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'EmailAddress' => 'Varchar',
		'ContactNumber' => 'Varchar',
		'SocialGooglePlus' => 'Text', 
		'SocialFacebook' => 'Text', 
		'SocialTwitter' => 'Text', 
		'SocialYoutube' => 'Text', 
		'SocialLinkedIn' => 'Text', 
		'FooterActionBoxButtonText' => 'Varchar', 
		'Copyright' => 'Text'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Logo' => 'Image',
		'FooterActionBoxRedirectPage' => 'SiteTree'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'FooterMenus' => 'FooterMenu', 
		'FooterLegalMenus' => 'FooterLegalMenu',
		'SocialServices' => 'SocialNetworkService'
	);

	/**
	 * Update CMS Fields
	 * 
	 * @param  FieldList $fields
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab(
			'Root.Contact', 
			EmailField::create('EmailAddress', 'Email Address')
		);

		$fields->addFieldToTab(
			'Root.Contact', 
			TextField::create('ContactNumber', 'Contact Number')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			TextareaField::create('Copyright', 'Copyright')
		);		

		$fields->addFieldToTab(
			'Root.Main', 
			UploadField::create('Logo', 'Upload logo')
		);

		$fields = $this->getSocialFields($fields);
		$fields = $this->getFooterMenuField($fields);
		$fields = $this->getActionBoxFields($fields);
	}

	/**
	 * Get social fields
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getSocialFields(&$fields) {
		$fields->addFieldToTab(
			'Root.Social', 
			GridField::create(
				'SocialServices', 
				'Social Network Services', 
				$this->owner->SocialServices(), 
				GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	/**
	 * Get footer blocks field
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getFooterMenuField(&$fields) {
		$fields->addFieldToTab(
			'Root.Footer', 
			GridField::create(
				'FooterMenus', 
				'Footer Menus', 
				$this->owner->FooterMenus(), 
				GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		$fields->addFieldToTab(
			'Root.Footer', 
			GridField::create(
				'FooterLegalMenus', 
				'Footer Legal Menus', 
				$this->owner->FooterLegalMenus(), 
				GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'))
			)			
		);		

		return $fields;
	}

	/**
	 * Get footer blocks field
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getActionBoxFields(&$fields) {
		$fields->addFieldToTab(
			'Root.ActionBox', 
			TextField::create('FooterActionBoxButtonText', 'Button Text')
		);

		$fields->addFieldToTab(
			'Root.ActionBox', 
			TreedropdownField::create(
				'FooterActionBoxRedirectPageID', 
				'Choose a redirect page', 
				'SiteTree'
			)
		);

		return $fields;
	}

	/**
	 * Get full contact number
	 *
	 * @return Contact Number
	 */
	public function FullContactNumber() {
		return preg_replace('/\s+/', '', $this->owner->ContactNumber);
	}
}