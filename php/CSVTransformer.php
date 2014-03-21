<?php

namespace samyapp\hierarchical;

/**
 * Transform an array to a CSV output
 */
class CSVTransformer
{
	public $delimiter = ',';
	public $enclosure = '"';
	public $includeColumnNames = true;

	public function output($node_array, $file_pointer = null)
	{
		if (null == $file_pointer) {
			$file_pointer = fopen('php://output', 'w');
		}
		if ( $this->includeColumnNames && count($node_array) > 0) {
			fputcsv($file_pointer, array_keys($node_array[0]), $this->delimiter, $this->enclosure);
		}
		foreach ($node_array as $item) {
			fputcsv($file_pointer, $item, $this->delimiter, $this->enclosure);
		}
	}
}
