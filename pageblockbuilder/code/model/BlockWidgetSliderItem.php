<?php
class BlockWidgetSliderItem extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Content' => 'HTMLText', 
		'ButtonText' => 'Varchar', 
		'SortOrder' => 'Int'
	);	

	private static $has_one = array(
		'Parent' => 'BlockWidgetSlider', 
		'RedirectPage' => 'SiteTree',
		'Icon' => 'File', 
		'Image' => 'Image'
	);

	private static $singular_name = 'Slider';

	private static $plural_name = 'Sliders';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab('Root.Main', array('ParentID', 'Image', 'Icon', 'SortOrder'));
		$fields->replaceField('Title', TextField::create('Title', 'Title'));
		$fields->dataFieldByName('Content')
			->setRows(20);
		$fields->dataFieldByName('ButtonText')->setTitle('Redirect button title');
		$fields->replaceField(
			'RedirectPageID', 
			TreedropdownField::create('RedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('Icon', 'Icon')
					->setFolderName($this->Parent()->Page()->Title . '/SliderIcons/'), 
				'RedirectPageID'
			);

			$fields->insertAfter(
				UploadField::create('Image', 'Image')
					->setFolderName($this->Parent()->Page()->Title . '/SliderImages/'), 
				'Icon'
			);
		}

		return $fields;
	}
}