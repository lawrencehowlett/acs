<?php
class PageBlockBuilder extends Page {

	private static $has_many = array(
		'Rows' => 'BlockRow'
	);

	private static $icon = 'pageblockbuilder/images/pbb-icon.png';

	public function getCMSFields() {
		Requirements::css('pageblockbuilder/css/cms.css');
		Requirements::javascript('pageblockbuilder/javascript/cms.js');
		$self =& $this;
		$this->beforeUpdateCMSFields(function($fields) use ($self) {

			$components = PageBlockBuilderAdminSidebar::create(
				ToggleCompositeField::create(
					'AddRow', 
					'Add Row',
					array(
						TextField::create('RowLayout', 'Enter number of columns', '1'),
						LiteralField::create(
							'AddRowButton', 
							'<div class="field">
								<button class="cms-row-add-button ss-ui-button ss-ui-action-constructive ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary">
									Insert
								</button>
							</div>'
						)
					)
				),
				ToggleCompositeField::create(
					'AddWidget',
					'Add Widget',
					array(
						LiteralField::create(
							'PageBlockBuilderText', 
								'<div class="cms-panel-content center">
									<ul class="cms-menu-list">
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Text</span>
												<span class="icon icon-16 icon-pbb-text">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Gallery</span>
												<span class="icon icon-16 icon-pbb-gallery">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Video</span>
												<span class="icon icon-16 icon-pbb-video">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Image</span>
												<span class="icon icon-16 icon-pbb-image">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Accordion</span>
												<span class="icon icon-16 icon-pbb-accordion">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Tabs</span>
												<span class="icon icon-16 icon-pbb-tabs">&nbsp;</span>
											</a>
										</li>
										<li class="link" style="margin-bottom:5px;">
											<a href="" style="background: #E6EAED; border:1px solid #DDD;">
												<span class="text">Form</span>
												<span class="icon icon-16 icon-pbb-form">&nbsp;</span>
											</a>
										</li>

									</ul>
								</div>')
					)
				)				
			)->setTitle('Components');

			$fields->insertBefore($components, 'Root');
		});

		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.BlockBuilder', BlockDroppableField::create('BlockDroppable'));

		$fields->fieldByName('Root')->setTemplate('TabSet_holder');

		return $fields;
	}
}

class PageBlockBuilder_Controller extends Page_Controller {}