<?php
class BlogCategory_Extension extends DataExtension {

	public function getCodeIdentifier() {
		return strtolower(str_replace(' ', '-', $this->owner->Title));
	}
}