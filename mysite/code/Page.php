<?php
/**
 * Represents the standard landing page
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class Page extends SiteTree {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'Description' => 'HTMLText'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'Banner' => 'Image'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'ActionBoxes' => 'ActionBox'
	);

	/**
	 * Set many many extra fields
	 * 
	 * @var array
	 */
    public static $many_many_extraFields=array(
        'ActionBoxes' => array(
            'SortColumn' => 'Int'
        )
    );		

	/**
	 * Get CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->insertBefore(
			UploadField::create('Banner', 'Banner')
				->setFolderName('Banners/'),
			'Content'
		);

		$fields->insertBefore(
			ToggleCompositeField::create(
				'CustomHeaderImage', 
				'Attach A Header Description', 
				array(
					HTMLEditorField::create('Description', 'Header description')->setRows(20)
				)
			),
			'Content'
		);

		$fields->addFieldToTab(
			'Root.ActionBoxes', 
			GridField::create(
				'ActionBoxes', 
				'Action Boxes', 
				$this->ActionBoxes(), 
				GridFieldConfig_RelationEditor::create()
					->addComponent(new GridFieldSortableRows('SortColumn'))
			)
		);

		return $fields;
	}

    public function ActionBoxes() {
        return $this->getManyManyComponents('ActionBoxes')->sort('SortColumn');
    }	
}

/**
 * controls the page class
 * 
 * @author Julius Caamic <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius Caamic
 */
class Page_Controller extends ContentController {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		Requirements::css('themes/acs/css/main.css');
		Requirements::css('themes/acs/css/jquery.mCustomScrollbar.min.css');

		Requirements::javascript('https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false');
		Requirements::javascript('themes/acs/js/min.js');
	}

	/**
	 * Get the correct index of the list
	 * 
	 * @return int
	 */
	public function getListIndex($number) {
		if ($number) {
			return $number - 1;
		}

		return 0;
	}	
}
