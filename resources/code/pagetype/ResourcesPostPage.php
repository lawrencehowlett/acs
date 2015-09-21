<?php
class ResourcesPostPage extends BlogPost {

	/**
	 * Set many many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'RelatedResources' => 'ResourcesActionBox'
	);

	/**
	 * Set many many extra field
	 * 
	 * @var array
	 */
    public static $many_many_extraFields=array(
        'RelatedResources' => array(
            'SortColumn' => 'Int'
        )
    );

    /**
     * Set page icon
     * 
     * @var string
     */
	private static $icon = 'resources/images/pen-check-icon.png';

	/**
	 * Set singular name
	 * 
	 * @var string
	 */
	private static $singular_name = 'Article';

	/**
	 * Set plural name
	 * 
	 * @var string
	 */
	private static $plural_name = 'Articles';

	/**
	 * GEt CMS fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->removeByName('Widgets');
		$fields->removeByName('RelatedPosts');
		$fields->removeByName('Tags');
		$fields->removeByName('Categories');
		$fields->removeByName('Authors');
		$fields->removeByName('AuthorNames');

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('Resources/FeaturedImages/');

		$fields->addFieldToTab(
			'Root.RelatedResources', 
			GridField::create(
				'RelatedResources', 
				'Related Resources', 
				$this->owner->RelatedResources(), 
				GridFieldConfig_RelationEditor::create()
					->addComponent(new GridFieldSortableRows('SortColumn'))
			)
		);

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('FeaturedImage')
		);

		return $fields;
	}

    public function RelatedResources() {
        return $this->getManyManyComponents('RelatedResources')->sort('SortColumn');
    }	

	public function canShowBlockBuilder() {
		return false;
	}	
}

class ResourcesPostPage_Controller extends BlogPost_Controller {

	public function init() {
		parent::init();
	}
}