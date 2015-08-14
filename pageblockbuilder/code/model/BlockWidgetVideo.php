<?php
class BlockWidgetVideo extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
		'VideoURL' => 'Text'
	);
}