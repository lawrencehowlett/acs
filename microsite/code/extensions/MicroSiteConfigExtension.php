<?php
class MicroSiteConfig_Extension extends DataExtension {
	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'MicroFooterMenus' => 'MicroFooterMenu'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab(
			'Root.Footer', 
			GridField::create(
				'MicroFooterMenus', 
				'Micro Footer Menus', 
				$this->owner->MicroFooterMenus(), 
				GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);	

		return $fields;
	}
}