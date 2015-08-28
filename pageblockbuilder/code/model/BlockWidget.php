<?php
class BlockWidget extends DataObject {

	private static $db = array(
		'Title' => 'Text', 
		'Code' => 'Varchar',
		'ExtraClass' => 'Varchar',
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'Page' => 'Page', 
		'BackgroundImage' => 'Image'
	);

	private static $singular_name = 'Widget';

	private static $plural_name = 'Widgets';

	private static $summary_fields = array(
		'ComponentName' => 'Component', 
		'Title' => 'Title'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('PageID', 'Title', 'Code', 'SortOrder', 'ExtraClass', 'BackgroundImage')
		);

		if (!$this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				DropdownField::create(
					'ClassName', 
					'Widgets', 
					$this->getListComponents()
				)->setEmptyString('Choose a widget to add')
			);
		} else {
			$fields->addFieldToTab(
				'Root.Main', 
				TextField::create('Title', 'Title')
			);

			$fields->addFieldToTab(
				'Root.Main', 
				TextField::create('ExtraClass', 'Extra class')
			);

			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('BackgroundImage', 'Background Image')
					->setFolderName('BackgroundImages/')
			);

		}

		return $fields;
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if (!$this->Title) {
			$this->Title = 'New ' . strtolower(self::$singular_name);		
		}
	}

	public function getListComponents() {
		$components = array(
			'BlockWidgetText' => 'Text',
			'BlockWidgetImage' => 'Image',
			'BlockWidgetVideo' => 'Video',
			'BlockWidgetTab' => 'Tabs',
			'BlockWidgetGallery' => 'Gallery',
			'BlockWidgetAccordion' => 'Accordion', 
			'BlockWidgetSlider' => 'Slider', 
			'BlockWidgetActionBox' => 'Action Box'
		);

		$this->extend('updateListComponents', $components);

		return $components;
	}
}