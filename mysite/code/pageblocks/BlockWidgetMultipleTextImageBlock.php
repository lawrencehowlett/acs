<?php
/**
 * Represent multiple text image blocks
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlockWidgetMultipleTextImageBlock extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'TextImageBlocks' => 'BlockWidgetMultipleTextImageBlockItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('TextImageBlocks');
		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage', 'ExtraClass')
		);

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'TextImageBlocks', 
				'Text Image Blocks', 
				$this->TextImageBlocks(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		return $fields;
	}

	/**
	 * Get extra class
	 * 
	 * @return string
	 */
	public function getExtraClass() {
		return 'mt60 mb30';
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Multiple Text Image Block widget';
	}
}