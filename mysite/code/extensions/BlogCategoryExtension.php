<?php
class BlogCategory_Extension extends DataExtension {

	private static $db = array(
		'SubTitle' => 'HTMLText', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'BannerImage' => 'Image'
	);

	private static $default_sort = 'SortOrder';

	public function updateCMSFields(FieldList $fields) {
		$fields->push(
			HTMLEditorField::create('SubTitle', 'Subtitle')
				->setRows(10)
		);

		$fields->push(
			UploadField::create('BannerImage', 'Banner image')
				->setFolderName('Banners')
		);

		return $fields;
	}

	public function getCodeIdentifier() {
		return strtolower(str_replace(' ', '-', $this->owner->Title));
	}
}