<?php
class FeaturedResources_Page_Extension extends DataExtension {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'ResourcesTitle' => 'Text', 
		'RedirectButtonText' => 'Varchar'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'ResourcesRedirectPage' => 'SiteTree'
	);

	/**
	 * Set many many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'Resources' => 'ResourcesPostPage'
	);

    public static $many_many_extraFields=array(
        'Resources' => array(
            'SortOrder' => 'Int'
        )
    );	

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab(
			'Root.Resources', 
			TextField::create('ResourcesTitle', 'Title')
		);

		$fields->addFieldToTab(
			'Root.Resources', 
			TextField::create('RedirectButtonText', 'Redirect button text')
		);

		$fields->addFieldToTab(
			'Root.Resources', 
			TreeDropdownField::create('ResourcesRedirectPageID', 'Choose a redirect page', 'SiteTree')
		);

		$fields->addFieldToTab(
			'Root.Resources', 
			GridField::create(
				'Resources', 
				'Resources', 
				$this->owner->Resources(), 
				GridFieldConfig_RelationEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);		
	}

    public function Resources() {
        return $this->getManyManyComponents('Resources')->sort('SortOrder');
    }
}