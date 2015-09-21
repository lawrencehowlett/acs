<?php
/**
 * Extension to blog post
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlogPost_Extension extends DataExtension {

	/**
	 * Set many many
	 * 
	 * @var array
	 */
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
				'Related Posts', 
				$this->owner->RelatedBlogPosts(), 
				GridFieldConfig_RelationEditor::create()
			)
		);

		$fields->dataFieldByName('FeaturedImage')
			->setFolderName('BlogPosts/FeaturedImages');
	}
}

/**
 * Extension to blog post
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class BlogPost_Controller_Extension extends Extension {

	public function onAfterInit() {
		Requirements::customCSS(<<<CSS
			.st_facebook_custom, .st_twitter_custom, .st_linkedin_custom, .st_googleplus_custom {
				cursor: pointer;
			}
CSS
		);

		Requirements::javascript('http://w.sharethis.com/button/buttons.js');
		Requirements::customScript(<<<JS
			stLight.options({
				publisher: "df062f19-5c0a-49cd-aa6c-241a45fa6d96", 
				doNotHash: false, 
				doNotCopy: false, 
				hashAddressBar: false, 
				servicePopup: true
			});			
JS
		);
	}
}