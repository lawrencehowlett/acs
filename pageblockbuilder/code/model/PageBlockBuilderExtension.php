<?php
class PageBlockBuilder_CMSMain_Extension extends Extension {

	public function LinkPageBlockBuilder() {
		if($id = $this->owner->currentPageID()) {
			return $this->owner->LinkWithSearch(
				Controller::join_links(singleton('CMSPageBlockBuilderController')->Link('show'), $id)
			);
		}
	}
}

class PageBlockBuilder_Page_Extension extends DataExtension {

	private static $has_many = array(
		'Widgets' => 'BlockWidget'
	);

	public function getBlockBuilderFields() {
		$fields = new FieldList(
			new TabSet('Root', 
				new Tab('BlockBuilder', 
					GridField::create('Widgets', 'Widgets', $this->owner->Widgets(), GridFieldConfig_RecordEditor::create())
				)
			)
		);

		return $fields;
	}
}