<?php
class BlockWidgetGallery extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $has_many = array(
		'Images' => 'Image'
	);
}