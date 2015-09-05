<?php
class BlockWidget_Extension extends DataExtension {
	public function updateListComponents(&$components) {
		$components['BlockWidgetResources'] = 'Resources widget';
		$components['BlockWidgetSimpleImage'] = 'Simple image text';
		$components['BlockWidgetCaseStudies'] = 'Case Studies widget';
		$components['BlockWidgetShowcase'] = 'Showcase widget';
		$components['BlockWidgetProjects'] = 'Projects widget';
		$components['BlockWidgetWork'] = 'Works widget';
		$components['BlockWidgetMultipleTextImageBlock'] = 'Multiple Text Image Block widget';
	}	
}