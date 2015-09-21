<?php
/**
 * Represents the specialist widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetSpeakToSpecialist extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'ActionBoxTitle' => 'Text', 
		'ActionBoxTagline' => 'Text', 
		'ActionBoxContent' => 'HTMLText',
		'ActionBoxButtonText' => 'Varchar',
		'MailFrom' => 'Varchar', 
		'MailToSubject' => 'Text', 
		'MailToBody' => 'HTMLText', 
		'MailToAdminBody' => 'HTMLText',
		'ButtonText' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'RedirectPage' => 'SiteTree',
		'ActionBoxRedirectPage' => 'SiteTree', 
		'FeaturedImage' => 'Image', 
		'ActionBoxBackgroundImage' => 'Image'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'ExtraClass')
		);

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('SpeakToSpecialist/Images');

		$fields->replaceField(
			'RedirectPageID', 
			TreeDropdownField::create(
				'RedirectPageID', 
				'Choose a redirect page', 
				'SiteTree'
			)
		);

		$fields->insertAfter($fields->dataFieldByName('ButtonText'), 'Title');
		$fields->insertAfter($fields->dataFieldByName('RedirectPageID'), 'ButtonText');
		$fields->insertAfter($fields->dataFieldByName('FeaturedImage'), 'RedirectPageID');

		$fields = $this->getActionBoxFields($fields);
		$fields = $this->getMailFields($fields);

		return $fields;
	}

	/**
	 * Get action box fields
	 *
	 * @return FieldList
	 */
	private function getActionBoxFields(&$fields) {
		$fields->addFieldToTab(
			'Root.ActionBox', 
			TextField::create('ActionBoxTitle', 'Title')
		);
		$fields->addFieldToTab(
			'Root.ActionBox', 
			TextareaField::create('ActionBoxTagline', 'Tagline')
		);
		$fields->addFieldToTab(
			'Root.ActionBox', 
			HTMLEditorField::create('ActionBoxContent', 'Content')
				->setRows(20)
		);
		$fields->addFieldToTab(
			'Root.ActionBox', 
			TextField::create('ActionBoxButtonText', 'ButtonText')
		);
		$fields->addFieldToTab(
			'Root.ActionBox', 
			TreeDropdownField::create('ActionBoxRedirectPageID', 'Choose a redirect page', 'SiteTree')
		);
		$fields->addFieldToTab(
			'Root.ActionBox', 
			UploadField::create('ActionBoxBackgroundImage', 'Background image')
				->setFolderName('SpeakToSpecialist/Images/Background')
		);

		return $fields;
	}

	/**
	 * Get mail fields
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getMailFields(&$fields) {
		$fields->addFieldToTab(
			'Root.Mail', 
			EmailField::create('MailFrom', 'From')
		);
		$fields->addFieldToTab(
			'Root.Mail', 
			TextField::create('MailToSubject', 'Subject')
		);		
		$fields->addFieldToTab(
			'Root.Mail', 
			HTMLEditorField::create('MailToBody', 'Lead reply message')
				->setRows(20)
		);
		$fields->addFieldToTab(
			'Root.Mail', 
			HTMLEditorField::create('MailToAdminBody', 'Admin reply message')
				->setRows(20)
		);

		$fields->addFieldToTab(
			'Root.Mail', 
			ToggleCompositeField::create(
				'CustomMailToAdminBody', 
				'List of variables for admin reply message', 
				array(
					LiteralField::create(
						'MailToAdminBodyVariables', 
						'<div style="padding:10px;">$CompanyName, $Name, $Email, $Telephone, $BestTimeToCall</div>'
					)
				)
			)			
		);

		return $fields;
	}

	/**
	 * Get extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'dark specialist cf';
	}

	/**
	 * Get component name
	 *
	 * @return String
	 */
	public function ComponentName() {
		return 'Speak to specialist form widget';
	}
}