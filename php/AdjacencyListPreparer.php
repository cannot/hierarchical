<?php

namespace samyapp\hierarchical;

class AdjacencyListPreparer
{
	/**
	 * @var The name in the node data array to use for the parent_id field.
	 */
	public $parentKeyName = 'parent_id';

	/**
	 * @var The name in the node data array to use as the primary key field.
	 */
	public $primaryKeyName = 'id';

	/**
	 * @var The value of the primary key of the previous node.
	 */
	public $previousPrimaryKey = 0;

	/**
	 * @var Whether to generate primary key values (true) or use existing ones in Node->data[$this->primaryKeyName] (false)
	 */
	public $generatePrimaryKey = true;

	private $parentIDStack = array();

	/**
	 * Works on assumption that it is called on each node as nodes are visited depth-first...
	 */
	public function prepare($node)
	{
		if ($this->generatePrimaryKey) {
			$node->data[$this->primaryKeyName] = ++$this->previousPrimaryKey;
		}
		$parent_id = $node->depth > 1 ? $this->parentIDStack[$node->depth-1] : null; 
		$node->data[$this->parentKeyName] = $parent_id;
		$this->parentIDStack[$node->depth] = $node->data[$this->primaryKeyName];
	}
}

