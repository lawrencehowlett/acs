<?php
class MicroPage extends MicroSiteHolder {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'microsite/images/microsoft-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Content')
		);

		return $fields;
	}
}

class MicroPage_Controller extends MicroSiteHolder_Controller {

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();
	}

	/**
	 * Get micro menus
	 * 
	 * @return SiteTree
	 */
	public function getMicroMenus() {
		return SiteTree::get()->filter(array('ParentID' => $this->getMicroHolder()->ID));
	}

	/**
	 * Get Micro holder page
	 * 
	 * @return MicroPage
	 */
	public function getMicroHolder() {
		if ($this->Parent()->ClassName == 'MicroSiteHolder') {
			return $this->Parent();
		}

		if ($this->Parent()->Parent()->ClassName == 'MicroSiteHolder') {
			return $this->Parent()->Parent();
		}

		return null;
	}
}