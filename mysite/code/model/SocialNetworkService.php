<?php
class SocialNetworkService extends DataObject {

	private static $db = array(
		'Title' => 'Varchar', 
		'CSS' => 'Varchar(50)',
		'ExternalURL' => 'Varchar(2083)', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'SiteConfig' => 'SiteConfig'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('SortOrder', 'SiteConfigID')
		);

		return $fields;
	}
}