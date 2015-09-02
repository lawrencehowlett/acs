<?php
class ResourcesPostPage extends BlogPost {

	private static $icon = 'resources/images/pen-check-icon.png';

	private static $singular_name = 'Resource';

	private static $plural_name = 'Resources';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');

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

		return $fields;
	}
}

class ResourcesPostPage_Controller extends BlogPost_Controller {

}