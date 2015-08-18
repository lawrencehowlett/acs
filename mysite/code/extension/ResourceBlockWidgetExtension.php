<?php
class ResourceBlockWidget_Extension extends DataExtension {
	public function updateListComponents(&$components) {
		$components['FeaturedResource'] = 'Featured Resources';
	}
}