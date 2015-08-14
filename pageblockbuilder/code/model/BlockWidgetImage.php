<?php
class BlockWidgetImage extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText',
	);

	private static  $has_one = array(
		'Image' => 'Image'
	);
}