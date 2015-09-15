<?php
class PageBlockBuilder_CMSMain_Extension extends Extension {

	private static $disallow_modules = array(
		'Blog', 'BlogPost'
	);

	public function LinkPageBlockBuilder() {
		if($id = $this->owner->currentPageID()) {
			return $this->owner->LinkWithSearch(
				Controller::join_links(singleton('CMSPageBlockBuilderController')->Link('show'), $id)
			);
		}
	}

	/**
	 * Check to show or hide block builder menu
	 *
	 * @return true
	 */
	public function ShowBlockBuilder() {
		$id = $this->owner->currentPageID();
		if ($id) {
			$page = Page::get()->byID($id);
			if ($page) {
				if (!$page->canShowBlockBuilder() || in_array($page->ClassName, self::$disallow_modules)) {
					return false;
				}
			}
		}

		return true;
	}
}

/**
 * Extension to page for block builder
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class PageBlockBuilder_Page_Extension extends DataExtension {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Widgets' => 'BlockWidget'
	);

	/**
	 * Get block builder fields
	 * 
	 * @return FieldList
	 */
	public function getBlockBuilderFields() {
		$fields = new FieldList(
			new TabSet('Root', 
				new Tab('BlockBuilder', 
					GridField::create(
						'Widgets', 
						'Widgets', 
						$this->owner->Widgets(), 
						GridFieldConfig_RecordEditor::create()
							->addComponent(new GridFieldSortableRows('SortOrder'))
					)
				)
			)
		);

		return $fields;
	}
}