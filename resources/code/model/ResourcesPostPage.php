<?php
class ResourcesPostPage extends BlogPost {

	private static $many_many = array(
		'RelatedResources' => 'ResourcesPostPage'
	);

	private static $icon = 'resources/images/pen-check-icon.png';

	private static $singular_name = 'Resource';

	private static $plural_name = 'Resources';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->removeByName('Widgets');
		$fields->removeByName('RelatedPosts');

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('Resources/FeaturedImages/');

		$fields->insertAfter(
			ListboxField::create(
				'DocumentTypes',
				'Document Types',
				ResourceDocumentType::get()->map()->toArray()
			)->setMultiple(true), 
			'Categories'
		);

		$fields->addFieldToTab(
			'Root.RelatedResources', 
			GridField::create(
				'RelatedResources', 
				'Related Resources', 
				$this->owner->RelatedResources(), 
				GridFieldConfig_RelationEditor::create()
			)
		);		

		return $fields;
	}
}

class ResourcesPostPage_Controller extends BlogPost_Controller {

	public function init() {
		parent::init();
	}
}