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

	private static $default_sort = 'SortOrder';

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
				ToggleCompositeField::create(
					'ExtraClassDescriptionContainer', 
					"Extra classes and it's corresponding description", 
					array(
						TextField::create('ExtraClass', 'Extra class'), 
						LiteralField::create(
						'ExtraClassDescription', 
						'<h1 style="margin:10px; font-weight; bold; font-size:14px;">Description of the extra classes</h1>
						<table style="margin:10px;">
							<thead>
								<th style="padding:5px; background: #ccc; font-weight:bold; border:1px solid #333;">Class name</th>
								<th style="padding:5px; background: #ccc; font-weight:bold; border:1px solid #333;">Description</th>
							</thead>
							<tbody>
								<tr>
									<td style="padding:5px; border:1px solid #333;">video-section</td>
									<td style="padding:5px; border:1px solid #333;">Required for video blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">text-section</td>
									<td style="padding:5px; border:1px solid #333;">Required for text blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">contact</td>
									<td style="padding:5px; border:1px solid #333;">Required for form blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">address-section</td>
									<td style="padding:5px; border:1px solid #333;">Required for map blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">specialist</td>
									<td style="padding:5px; border:1px solid #333;">Required for speak to specialist form blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">big-slider</td>
									<td style="padding:5px; border:1px solid #333;">Required for showcase blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">main-showcase</td>
									<td style="padding:5px; border:1px solid #333;">Required for showcase blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">cs-showcase</td>
									<td style="padding:5px; border:1px solid #333;">Required for case studies showcase blocks</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">navigated-slider</td>
									<td style="padding:5px; border:1px solid #333;">Required for slider blocks (showcase, spinning banner, case studies showcase)</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">shade</td>
									<td style="padding:5px; border:1px solid #333;">Adds a light grayish blue background, also if it has background image it will center it.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">dark</td>
									<td style="padding:5px; border:1px solid #333;">Adds a very dark blue background colour.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">spaced</td>
									<td style="padding:5px; border:1px solid #333;">Adds 30 pixel padding top.</td>
								</tr>		
								<tr>
									<td style="padding:5px; border:1px solid #333;">nospace</td>
									<td style="padding:5px; border:1px solid #333;">Adds 30 pixel padding bottom.</td>
								</tr>										
								<tr>
									<td style="padding:5px; border:1px solid #333;">mt30</td>
									<td style="padding:5px; border:1px solid #333;">Add 30 pixels margin top.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">mt40</td>
									<td style="padding:5px; border:1px solid #333;">Add 40 pixels margin top.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">mt60</td>
									<td style="padding:5px; border:1px solid #333;">Add 60 pixels margin top.</td>
								</tr>																
								<tr>
									<td style="padding:5px; border:1px solid #333;">mb30</td>
									<td style="padding:5px; border:1px solid #333;">Add 30 pixels margin bottom.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">mb40</td>
									<td style="padding:5px; border:1px solid #333;">Add 40 pixels margin bottom.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">mb60</td>
									<td style="padding:5px; border:1px solid #333;">Add 60 pixels margin bottom.</td>
								</tr>
								<tr>
									<td style="padding:5px; border:1px solid #333;">last-section</td>
									<td style="padding:5px; border:1px solid #333;">Add this class to last block</td>
								</tr>
							</tbody>
						</table>'
						)
					)
				)
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
			'BlockWidgetText' => 'Text widget',
			'BlockWidgetImage' => 'Image widget',
			'BlockWidgetVideo' => 'Video widget',
			'BlockWidgetTab' => 'Tabs widget',
			'BlockWidgetGallery' => 'Gallery sliding widget',
			'BlockWidgetAccordion' => 'Accordion widget', 
			'BlockWidgetSlider' => 'Slider widget', 
			'BlockWidgetActionBox' => 'Action Box widget'
		);

		$this->extend('updateListComponents', $components);

		asort($components);

		return $components;
	}
}