<?php
class BlockWidgetSpeakToSpecialist extends BlockWidget {

	private static $db = array(
		'ActionBoxTitle' => 'Text', 
		'ActionBoxContent' => 'HTMLText',
		'ActionBoxButtonText' => 'Varchar',
		'MailFrom' => 'Varchar', 
		'MailToSubject' => 'Text', 
		'MailToBody' => 'HTMLText', 
		'MailToAdminBody' => 'HTMLText',
		'ButtonText' => 'Varchar'
	);

	private static $has_one = array(
		'RedirectPage' => 'SiteTree',
		'ActionBoxRedirectPage' => 'SiteTree', 
		'FeaturedImage' => 'Image'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
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

		$fields->insertAfter($fields->dataFieldByName('RedirectPageID'), 'ExtraClass');
		$fields->insertAfter($fields->dataFieldByName('FeaturedImage'), 'RedirectPageID');
		$fields->insertAfter($fields->dataFieldByName('ButtonText'), 'ExtraClass');

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

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return String
	 */
	public function ComponentName() {
		return 'Speak to specialist widget';
	}
}