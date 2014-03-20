<?php

namespace samyapp\hierarchical;

/**
 * Transform a Node to a CSV line
 */
class CSVTransformer
{
	public $columnSeparator = ',';
	public $encloseFieldsWith = '"';

	public function Transform($node)
	{
		$fields = array();
		foreach ($node as $key => $value) {
			$fields[] = $this->encloseFieldsWith . 
				str_replace($this->encloseFieldsWith, $this->encloseFieldsWith.$this->encloseFieldsWith, $value) . $this->encloseFieldsWith;
			
		}
		return join($this->columnSeparator,$fields);
	}
}
