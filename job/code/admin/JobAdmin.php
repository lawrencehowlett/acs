<?php
/**
 * Represents the jobs admin
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class JobAdmin extends ModelAdmin {

	/**
	 * Set managed models
	 * 
	 * @var array
	 */
	private static $managed_models = array(
		'Job', 
		'JobCategory', 
		'JobApplication'
	);

	/**
	 * Set the menu icon
	 * 
	 * @var string
	 */
	private static $menu_icon = 'mysite/images/hiring-icon.png';

	/**
	 * Set the url segment
	 * 
	 * @var string
	 */
	private static $url_segment = 'Jobs';

	/**
	 * Set the menu titlie
	 * 
	 * @var string
	 */
	private static $menu_title = 'Jobs';

	/**
	 * Get the edit form
	 * 
	 * @param  [type] $id
	 * @param  [type] $fields
	 * @return FiedList
	 */
	public function getEditForm($id = null, $fields = null) {
		$form = parent::getEditForm($id, $fields);

		if ($this->modelClass == 'JobCategory') {
			$fields = $form->Fields();

			$grid = $fields->fieldByName('JobCategory');
			$config = $grid->getConfig();
			$config->addComponent(new GridFieldSortableRows('SortOrder'));
		}

		return $form;
	}		
}