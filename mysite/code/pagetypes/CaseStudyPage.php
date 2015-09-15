<?php
/**
 * Represents the Case study page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudyPage extends BlogPost {

	/**
	 * Set properties
	 * 
	 * @var array
	 */
	private static $db = array(
		'GalleryImagesTitle' => 'Text',
		'FeaturedImageExtraClass' => 'Text'
	);

	/**
	 * Set has one
	 * 
	 * @var array
	 */
	private static $has_one = array(
		'GalleryImagesRedirectPage' => 'SiteTree'
	);

	/**
	 * Set has many
	 * 
	 * @var array
	 */
	private static $has_many = array(
		'Features' => 'CaseStudyFeature'
	);

	/**
	 * Set many many
	 * 
	 * @var array
	 */
	private static $many_many = array(
		'FeaturedImages' => 'Image', 
		'GalleryImages' => 'Image'
	);

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/search-document-icon.png';

	/**
	 * GEt CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');
		$fields->removeByName('RelatedPosts');
		$fields->removeByName('PublishDate');
		$fields->removeByName('Authors');
		$fields->removeByName('AuthorNames');

		$fields->removeFieldsFromTab(
			'Root.Main', array('PublishDate', 'FeaturedImage')
		);

		$fields->addFieldToTab(
			'Root.Features', 
			GridField::create(
				'Features', 
				'Features', 
				$this->Features(), 
				GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);

		$fields->addFieldToTab(
			'Root.GalleryImages', 
			TextField::create('GalleryImagesTitle', 'Title')
		);
		$fields->addFieldToTab(
			'Root.GalleryImages', 
			TreeDropdownField::create('GalleryImagesRedirectPageID', 'Choose a redirect page', 'SiteTree')
		);		
		$fields->addFieldToTab(
			'Root.GalleryImages', 
			UploadField::create('GalleryImages', 'Upload gallery images')
				->setFolderName('CaseStudies/GalleryImages')
		);

		$fields->addFieldToTab(
			'Root.FeaturedImages', 
			TextField::create('FeaturedImageExtraClass', 'Extra class')
				->setRightTitle('available classes (large, double)')
		);
		$fields->addFieldToTab(
			'Root.FeaturedImages', 
			UploadField::create('FeaturedImages', 'Upload featured images')
				->setFolderName('CaseStudies/FeaturedImages')
		);

		return $fields;
	}

	public function canShowBlockBuilder() {
		return false;
	}	
	
}

/**
 * Controls the Case study page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudyPage_Controller extends BlogPost_Controller {

	public function init() {
		parent::init();
	}
}

/**
 * Extension to extend case study featured images
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudyGalleryImages_DataExtension extends DataExtension {
	/**
	 * Set belongs many many
	 * 
	 * @var array
	 */
	private static $belongs_many_many = array(
		'CaseStudies' => 'CaseStudyPage'
	);
}

/**
 * Extension to extend case study featured images
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class CaseStudyFeaturedImage_DataExtension extends DataExtension {
	/**
	 * Set belongs many many
	 * 
	 * @var array
	 */
	private static $belongs_many_many = array(
		'CaseStudies' => 'CaseStudyPage'
	);
}