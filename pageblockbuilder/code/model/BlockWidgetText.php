<?php
class BlockWidgetText extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar',
		'Content' => 'HTMLText'
	);
}