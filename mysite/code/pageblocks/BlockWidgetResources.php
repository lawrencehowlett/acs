<?php
/**
 * 
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetResources extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'Resources' => 'ResourcesActionBox'
	);

	/**
	 * Set many many extra field
	 * 
	 * @var array
	 */
    public static $many_many_extraFields=array(
        'Resources' => array(
            'SortColumn' => 'Int'
        )
    );


	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Resources', 
				'Resources', 
				$this->Resources(),
				GridFieldConfig_RelationEditor::create()
					->addComponent(new GridFieldSortableRows('SortColumn'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

    public function Resources() {
        return $this->getManyManyComponents('Resources')->sort('SortColumn');
    }	

	/**
	 * Get Component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Resources widget';
	}
}