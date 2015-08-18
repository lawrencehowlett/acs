<?php
class BlockWidgetImage extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
	);

	private static  $has_one = array(
		'Image' => 'Image'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->dataFieldByName('Content')
			->setRows(20);

		return $fields;
	}
}