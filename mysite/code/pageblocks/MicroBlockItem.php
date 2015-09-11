<?php
class MicroBlockItem extends BlockWidgetActionBoxItem {

	private static $has_one = array(
		'MicroBlockParent' => 'MicroBlock'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('MicroBlockParentID', 'Image')
		);

		$fields->addFieldtoTab(
			'Root.Main', 
			TextField::create('ButtonText', 'Button text')
		);

		if ($this->ID) {
			$fields->addFieldToTab(
				'Root.Main', 
				UploadField::create('Image', 'Featured image')
					->setFolderName('MicroBlock/' . $this->ID . '/Images')
			);
		}

		return $fields;
	}	
}