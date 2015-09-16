<?php
/**
 * Represents the generic page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class GenericPage extends UserDefinedForm {

	/**
	 * Set icon
	 * 
	 * @var string
	 */
	private static $icon = 'mysite/images/paper-icon.png';

	/**
	 * Get CMS Fields
	 * 
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Widgets');

		$fields->removeFieldsFromTab(
			'Root.Main', 
			array('Content')
		);

		return $fields;
	}

	public function onBeforeWrite() {
		parent::onBeforeWrite();

		if ($this->Content == '') {
			$this->Content = "$UserDefinedForm";
		}
	}
}

/**
 * Controls the generic page
 * 
 * @author Julius <julius@greenbrainer.com>
 * @copyright Copyright (c) 2015, Julius
 */
class GenericPage_Controller extends UserDefinedForm_Controller {

	/**
	 * Set allowed actions
	 * 
	 * @var array
	 */
	private static $allowed_actions = array(
		'Form'
	);

	/**
	 * Initialise the controller
	 */
	public function init() {
		parent::init();

		Requirements::customCSS(<<<CSS
			form.userform {width: 50%;}
			form.userform fieldset{border: none;}
			form.userform input:focus:invalid {border: 1px solid #b03535; box-shadow: 0 0 5px #d45252;}
CSS
		);

		Requirements::block(FRAMEWORK_DIR .'/thirdparty/jquery/jquery.js');
	}

	/**
	 * User form
	 *
	 * @return  UserForm
	 */
	public function Form() {
		$form = parent::Form();
		$form->addExtraClass('col col2 contact-form');
		$form->setTemplate('BlockWidgetForm');

		$actions = $form->Actions();
		foreach ($actions as $action) {
			$action->useButtonTag = true;
		}

		return $form;
	}

	public function IsFinished() {
		if ($this->request->param('Action') == 'finished') {
			return true;
		}

		return false;
	}
}