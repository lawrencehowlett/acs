<?php
class SpeakToSpecialistsMailToAdminRecipients extends DataObject {

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $belongs_many_many = array(
		'SpeakToSpecialists' => 'BlockWidgetSpeakToSpecialist'
	);
}