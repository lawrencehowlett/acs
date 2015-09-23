<?php
/**
 * Represents the company showcase widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetShowcase extends BlockWidgetTab {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'ShowcaseItems' => 'BlockWidgetShowcaseItem'
	);

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'Items')
		);

		$fields->removeByName('ShowcaseItems');

		$fields->insertBefore(
			GridField::create(
				'ShowcaseItems', 
				'Showcase', 
				$this->ShowcaseItems(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Showcase Widget';
	}
}