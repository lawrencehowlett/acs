<?php
class BlockWidgetAccordion extends BlockWidget {

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $has_many = array(
		'Items' => 'BlockWidgetAccordionItem'
	);
}