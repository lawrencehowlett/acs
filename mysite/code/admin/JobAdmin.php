<?php
class JobAdmin extends ModelAdmin {

	private static $managed_models = array(
		'Job', 
		'JobCategory', 
		'JobApplication'
	);

	private static $menu_icon = 'mysite/images/hiring-icon.png';

	private static $url_segment = 'Jobs';

	private static $menu_title = 'Jobs';

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