<?php
class BlockWidget_Extension extends DataExtension {
	public function updateListComponents(&$components) {
		$components['BlockWidgetTeam'] = 'Team widget';
		$components['BlockWidgetDoubleSlider'] = 'Double slider widget';
		$components['BlockWidgetBatchIconSlider'] = 'Batch gallery slider widget';
		$components['BlockWidgetSpeakToSpecialist'] = 'Speak to specialist form widget';
		$components['BlockWidgetTable'] = 'Table widget';
		$components['BlockWidgetTwoColumnActionBox'] = 'Two column action box widget';
		$components['BlockWidgetResources'] = 'Resources widget';
		$components['BlockWidgetSimpleImage'] = 'Speak to specialist image text widget';
		$components['BlockWidgetCaseStudies'] = 'Case studies showcase widget';
		$components['BlockWidgetShowcase'] = 'Showcase widget';
		$components['BlockWidgetProjects'] = 'Featured project gallery widget';
		$components['BlockWidgetWork'] = 'How We Work widget';
		$components['BlockWidgetMultipleTextImageBlock'] = 'Multiple text image block widget';
	}	
}