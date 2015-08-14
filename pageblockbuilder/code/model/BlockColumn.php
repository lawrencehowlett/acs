<?php
class BlockColumn extends DataObject {

	private static $has_one = array(
		'Row' => 'BlockRow'
	);

	private static $has_many = array(
		'Widgets' => 'BlockWidget'
	);
}