<?php
/*class FeaturedResource extends BlockWidget {

	private static  $has_many = array(
		'Resources' => 'FeaturedResourceItem'
	);

	private static $has_one = array(
		'RedirectPage' => 'SiteTree'
	);

	private static $singular_name = 'featured resource';

	private static $plural_name = 'featured resources';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Resources');
		$fields->removeFieldsFromTab('Root.Main', array('RedirectPageID'));

		$fields->insertAfter(
			TreedropdownField::create('RedirectPageID', 'All resources redirect page', 'SiteTree'), 
			'ExtraClass'
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Resources', 
				'Resources', 
				$this->Resources(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	public function ComponentName() {
		return 'Resources widget';
	}
}*/