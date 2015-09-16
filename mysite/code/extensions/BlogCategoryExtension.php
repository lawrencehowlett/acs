<?php
class BlogCategory_Extension extends DataExtension {

	private static $db = array(
		'SubTitle' => 'HTMLText'
	);

	private static $has_one = array(
		'BannerImage' => 'Image'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->push(
			HTMLEditorField::create('SubTitle', 'SubTitle')
				->setRows(10)
		);

		$fields->push(
			UploadField::create('BannerImage', 'Banner image')
				->setFolderName('Blog/Categories/BannerImages')
		);

		return $fields;
	}

	public function getCodeIdentifier() {
		return strtolower(str_replace(' ', '-', $this->owner->Title));
	}
}