<?php
class ResourceDocumentType extends DataObject {

	private static $db = array(
		'Title' => 'Varchar', 
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		"Blog" => "Blog",
	);

	private static $belongs_many_many = array(
		"BlogPosts" => "BlogPost",
	);

	private static $singular_name = 'Document Type';

	private static $plural_name = 'Document Types';
}