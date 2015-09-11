<?php
class AboutStory extends BlockWidget {

	private static $db = array(
		'YearStarted' => 'Int'
	);

	private static  $has_many = array(
		'Entries' => 'AboutStoryEntry'
	);

	private static $singular_name = 'about story';

	private static $plural_name = 'about stories';

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Entries');
		$fields->removeFieldsFromTab('Root.Main', array('YearStarted', 'BackgroundImage', 'ExtraClass'));

		$fields->insertAfter(TextField::create('YearStarted', 'Year Started'), 'Title');

		$fields->addFieldToTab(
			'Root.Main', 
			GridField::create(
				'Entries', 
				'Story', 
				$this->Entries(), 
				GridFieldConfig_RecordEditor::create()
			)
		);

		return $fields;
	}

	public function getExtraClass() {
		return 'mt30';
	}

	public function ComponentName() {
		return 'Stories widget';
	}

	public function getTimeLine() {
		$list = new ArrayList();
		for ($year=date('Y'); $year >= $this->YearStarted; $year--) { 
			for ($month=12; $month >=1 ; $month--) { 

				$query = DB::query("SELECT ID FROM AboutStoryEntry WHERE Month(`Date`) = $month AND Year(`Date`) = $year");

				$list->push(new ArrayData(array(
					'DataMonth' => DateTime::createFromFormat("Y-m", date($year . '-' . $month))->format('Y-m'), 
					'Year' => DateTime::createFromFormat("Y", date($year))->format('Y'), 
					'Month' => DateTime::createFromFormat("m", date($month))->format('M'), 
					'StartOfYear' => ($month == 1) ? true : false, 
					'HasRecord' => ($query->numRecords() > 0) ? true : false
				)));
			}
		}

		return $list;
	}
}