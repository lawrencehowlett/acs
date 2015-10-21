<?php
class JobSetting extends DataExtension {

	private static $db = array(
		'JobAdminEmail' => 'Varchar'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab(
			'Root.Jobs', 
			EmailField::create('JobAdminEmail', 'Email')
				->setRightTitle('Recipient of job applications')
		);
	}
}