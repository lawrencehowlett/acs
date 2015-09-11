<?php
/**
 * Represents the team member widget
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetTeamMember extends DataObject {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Text', 
		'Position' => 'Text', 
		'SortOrder' => 'Int'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Team' => 'BlockWidgetTeam', 
		'Image' => 'Image'
	);

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Member';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Members';

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';	

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('TeamID', 'SortOrder')
		);

		$fields->dataFieldByName('Title')
			->setRows(2);
		$fields->dataFieldByName('Position')
			->setRows(2);

		return $fields;
	}
}