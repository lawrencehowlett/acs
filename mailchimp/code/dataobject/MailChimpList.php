<?php
class MailChimpList extends DataObject {

	private static $db = array(
		'Title' => 'Varchar',
		'ListID' => 'Varchar',
		'Code' => 'Varchar'		
	);

	private static $summary_fields = array(
		'Title' => 'Title',
		'ListID' => 'ID', 
		'Code' => 'Code'
	);

	private static $has_one = array(
		'SiteConfig' => 'SiteConfig'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('SiteConfigID');

		return $fields;
	}

	public function getListIDByCode() {
		
	}
}