<?php
class SiteTreeSetting extends DataExtension {
	
	private static $db = array(
		'ShowInTopNav' => 'Boolean'
	);

	public function updateSettingsFields(&$fields) {
		$fields->insertAfter(new CheckboxField('ShowInTopNav', 'Show in Top Navigation'), 'ShowInMenus');
	}

	public function getTopMenus() {
		return SiteTree::get()->filter(array('ShowInTopNav' => true));
	}
}