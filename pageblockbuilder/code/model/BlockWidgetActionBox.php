<?php
class BlockWidgetActionBox extends BlockWidget {

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'Items' => 'BlockWidgetActionBoxItem'
	);

	/**
	 * Get Cms fields
	 * 
	 * @return [type] [description]
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('BackgroundImage')
		);

		$fields->insertBefore(
			GridField::create(
				'Items', 
				'Action Boxes', 
				$this->Items(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			), 
			'ExtraClassDescriptionContainer'
		);

		return $fields;
	}

	/**
	 * Get component name
	 *
	 * @return string
	 */
	public function ComponentName() {
		return 'Action box widget';
	}
}