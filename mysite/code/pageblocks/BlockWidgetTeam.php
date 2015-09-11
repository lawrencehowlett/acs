<?php
class BlockWidgetTeam extends BlockWidget {

	private static $has_many = array(
		'Members' => 'BlockWidgetTeamMember'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Members');

		$fields->removeFieldsFromTab(
			'Root.Main',
			array('BackgroundImage', 'ExtraClass')
		);

		$gridFieldBulkUpload = new GridFieldBulkUpload();
		$gridFieldBulkUpload->setUfSetup('setFolderName', 'Teams/' . $this->ID . '/Images');
		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Members', 
				'Members', 
				$this->Members(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
					->addComponent($gridFieldBulkUpload)

			)
		);		

		return $fields;
	}

	public function ComponentName() {
		return 'Team widget';
	}
}