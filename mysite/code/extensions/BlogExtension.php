<?php
/**
 * Extension to Blog
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class Blog_Extension extends DataExtension {

	/**
	 * Set man many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'FeaturedBlogPosts' => 'BlogPost'
	);	

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/blog-icon.png';

	/**
	 * Update CMS fields
	 * 
	 * @param  FieldList $fields
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields) {
		$fields = $this->getAuthorsListField($fields);
		$fields = $this->getFeaturedPostsField($fields);
	}

	/**
	 * Get the list of authors
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getAuthorsListField(&$fields) {
		$group = Group::get()->filter(array('Code' => 'content-authors'))->First();
		$fields->addFieldToTab(
			'Root.Authors', 
			GridField::create('Authors', 'Authors', $group->Members(), GridFieldConfig_RecordEditor::create())
		);

		return $fields;		
	}

	/**
	 * Get featured posts
	 * 
	 * @param  FieldList &$fields
	 * @return FieldList
	 */
	private function getFeaturedPostsField(&$fields) {
		$fields->addFieldToTab(
			'Root.FeaturedPosts', 
			GridField::create(
				'FeaturedBlogPosts', 
				'Featured Posts', 
				$this->owner->FeaturedBlogPosts(), 
				GridFieldConfig_RelationEditor::create()
			)
		);

		return $fields;
	}

	public function updateGetBlogPosts(&$blogPosts) {
		$searchKeyword = Controller::curr()->request->getVar('Search');
		if ($searchKeyword) {
			$blogPosts = $blogPosts->filterAny(array(
				'Title:PartialMatch' => $searchKeyword, 
				'Content:PartialMatch' => $searchKeyword, 
				'Summary:PartialMatch' => $searchKeyword
			));
		}
	}
}
/**
 * Extension to Blog post
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class Blog_Controller_Extension extends Extension {
}