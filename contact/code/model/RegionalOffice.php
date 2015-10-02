<?php
/**
 * REpresents the regional offices of the company to attach to the contact page
 * 
 * @author Julius Camaic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class RegionalOffice extends DataObject {

	/**
	 * Set properties of db object
	 * 
	 * @var array
	 */
	private static $db = array(
		'Title' => 'Varchar', 
		'Address' => 'Text', 
		'Content' => 'HTMLText',
		'GoogleMapLat' => 'Text',
		'GoogleMapLong' => 'Text',
		'SortOrder' => 'Int'
	);

	/**
	 * Set one relationship
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'ContactPage' => 'ContactPage'
	);

	/**
	 * Set default sort
	 * 
	 * @var string
	 */
	private static $default_sort = 'SortOrder';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Branches');
		$fields->removeFieldsFromTab('Root.Main', array(
			'ContactPageID', 
			'SortOrder',  
			'GoogleMapLat', 
			'GoogleMapLong')
		);

		$fields->dataFieldByName('Content')
			->setRows(20);

		// Google map
		$fields->addFieldToTab(
			'Root.GoogleMap', 
			TextField::create('GoogleMapLat', 'Latitude')
		);
		$fields->addFieldToTab(
			'Root.GoogleMap', 
			TextField::create('GoogleMapLong', 'Longitude')
		);

        $fields->replaceField(
        	'Address', 
        	TextField::create('Address', 'Address')
        );		

		return $fields;
	}
}