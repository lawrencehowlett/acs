<?php
class Member_Extension extends DataExtension {

	private static $db = array(
		'Twitter' => 'Text',
		'Position' => 'Varchar'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->replaceField(
			'Twitter', 
			TextField::create('Twitter', 'Twitter')
		);
	}
}