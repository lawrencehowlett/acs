<?php
/**
 * Extension to blog post
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlogPost_Extension extends DataExtension {

	private static $many_many = array(
		'RelatedBlogPosts' => 'BlogPost'
	);

	/**
	 * Set page icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/bubble-icon.png';

	/**
	 * Update CMS fields
	 * 
	 * @param  FieldList $fields
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab(
			'Root.RelatedPosts', 
			GridField::create(
				'RelatedPosts', 
				'RelatedPosts', 
				$this->owner->RelatedBlogPosts(), 
				GridFieldConfig_RelationEditor::create()
			)
		);
	}
}

/**
 * Extension to blog post
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlogPost_Controller_Extension extends Extension {

}