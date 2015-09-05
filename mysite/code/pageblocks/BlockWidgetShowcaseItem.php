<?php
class BlockWidgetShowcaseItem extends BlockWidgetTabItem {

	private static $db = array(
		'TabTitle' => 'Varchar',
		'ExtraClass' => 'Varchar'
	);

	private static $has_one = array(
		'ShowcaseHolder' => 'BlockWidgetShowcase', 
		'BackgroundImage' => 'Image'
	);

	private static $singular_name = 'Showcase';

	private static $plural_name = 'Showcases';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('ShowcaseHolderID', 'ExtraClass', 'TabIcon', 'BackgroundImage', 'TabTitle')
		);

		$fields->insertAfter(TextField::create('TabTitle', 'Tab Title'), 'Title');
		$fields->insertAfter(TextField::create('ExtraClass', 'Extra class'), 'Content');

		if ($this->ID) {
			$fields->insertAfter(
				UploadField::create('BackgroundImage', 'Background Image')
					->setFolderName('Showcase/BackgroundImages/'), 
				'RedirectPageID'
			);

			$fields->dataFieldByName('Image')
				->setFolderName('Showcase/Images/');
		}

		return $fields;
	}
}