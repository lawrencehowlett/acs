<?php
class BlockRow extends DataObject {

	private static $has_many = array(
		'Columns' => 'BlockColumn'
	);
}