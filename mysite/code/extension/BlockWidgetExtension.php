<?php
class BlockWidget_Extension extends DataExtension {
	public function updateListComponents(&$components) {
		$components['BlockWidgetSimpleImage'] = 'Simple image text';
		$components['BlockWidgetCaseStudies'] = 'Case Studies';
		$components['BlockWidgetShowcase'] = 'Showcase';
		$components['BlockWidgetProjects'] = 'Projects';
		$components['BlockWidgetWork'] = 'Works';
	}	
}