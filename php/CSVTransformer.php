<?php

namespace samyapp\hierarchical;

/**
 * Transform a Node to a CSV line
 */
class CSVTransformer
{
	public $columnSeparator = ',';
	public $encloseFieldsWith = '"';
	public $includeColumnNames = true;

	public function Start($node)
	{
		$fields = array();
		foreach ($node->data as $key => $ignore) {
			$fields[] = $this->encloseFieldsWith . 
				str_replace($this->encloseFieldsWith, 
					$this->encloseFieldsWith . $this->encloseFieldsWith, $key) .
					$this->encloseFieldsWith;
		}
		return join($this->columnSeparator,$fields);
	}

	public function Finish($node) { return '';}

	public function Transform($node)
	{
		$fields = array();
		foreach ($node->data as $key => $value) {
			$fields[] = $this->encloseFieldsWith . 
				str_replace($this->encloseFieldsWith, $this->encloseFieldsWith.$this->encloseFieldsWith, $value) . $this->encloseFieldsWith;
			
		}
		return join($this->columnSeparator,$fields);
	}
}
