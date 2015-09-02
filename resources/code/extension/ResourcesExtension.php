<?php
class Resources_Page_Extension extends DataExtension {
	
	private static $has_many = array(
		'DocumentTypes' => 'ResourceDocumentType'
	);	
}

class ResourcesPost_Page_Extension extends DataExtension {

	private static $many_many = array(
		'DocumentTypes' => 'ResourceDocumentType'
	);
}