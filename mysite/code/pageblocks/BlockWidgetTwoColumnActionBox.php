<?php
class BlockWidgetTwoColumnActionBox extends BlockWidgetActionBox {
	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static  $has_many = array(
		'TwoColumnActionBoxItems' => 'BlockWidgetTwoColumnActionBoxItem'
	);

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Items');
		$fields->removeByName('TwoColumnActionBoxItems');

		$fields->insertBefore(
			GridField::create(
				'TwoColumnActionBoxItems', 
				'Action Boxes', 
				$this->TwoColumnActionBoxItems(), 
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
		return 'Two columns action box widget';
	}
}