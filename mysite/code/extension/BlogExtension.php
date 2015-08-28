<?php
class Blog_Extension extends DataExtension {

	private static $icon = 'mysite/images/blog-icon.png';

	public function updateCMSFields(FieldList $fields) {
		$fields = $this->getAuthorsList($fields);
	}	

	private function getAuthorsList(&$fields) {
		$group = Group::get()->filter(array('Code' => 'content-authors'))->First();
		$fields->addFieldToTab(
			'Root.Authors', 
			GridField::create('Authors', 'Authors', $group->Members(), GridFieldConfig_RecordEditor::create())
		);

		return $fields;		
	}
}

class Blog_Controller_Extension extends Extension {

}