<?php
class MicroSiteTree_Extension extends DataExtension {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'ShowInMicroSite' => 'Boolean'
	);

	/**
	 * Update settings tab fields
	 * 
	 * @param  FieldList &$fields 
	 * @return FieldList
	 */
	public function updateSettingsFields(&$fields) {
		$fields->insertAfter(new CheckboxField('ShowInMicroSite', 'Show in microsite'), 'ShowInMenus');
	}

	/**
	 * Get all microsite pages
	 * 
	 * @return Datalist
	 */
	public function getMicrositePages() {
		return Page::get()->filter(array('ShowInMicroSite' => true));
	}
}