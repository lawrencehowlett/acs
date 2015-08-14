<?php
class BlockWidget extends DataObject {

	private static $has_one = array(
		'Column' => 'BlockColumn'
	);
}