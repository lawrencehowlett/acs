<?php
/**
 * Represents the block widget form
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetForm extends BlockWidget {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Content' => 'HTMLText'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertAfter(
			$fields->dataFieldByName('Content')->setRows(20), 
			'Title'
		);

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Form widget';
	}
}