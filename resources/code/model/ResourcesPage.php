<?php
class ResourcesPage extends Blog {

	private static $icon = 'resources/images/books-icon.png';

	private static $allowed_children = array(
		'ResourcesPostPage'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->fieldByName('Root')->fieldByName('ChildPages')->setTitle('Resources Posts');

		$fields->insertAfter(
			GridField::create(
				'DocumentTypes',
				'Document Types',
				$this->DocumentTypes(),
				GridFieldCategorisationConfig::create(15, $this->DocumentTypes(), 'ResourceDocumentType', 'DocumentTypes', 'BlogPosts')
			), 
			'Categories'
		);

		return $fields;
	}

}

class ResourcesPage_Controller extends Blog_Controller {

}