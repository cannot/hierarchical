<?php

namespace samyapp\hierarchical;

class NestedSetPreparer
{
	/**
	 * @var The name in the node data array to use as the primary key field.
	 */
	public $primaryKeyName = 'id';

	/**
	 * @var Whether to generate primary key values (true) or use existing ones in Node->data[$this->primaryKeyName] (false)
	 */
	public $generatePrimaryKey = true;

	public $lft = 0;

	private $parentIDStack = array();

	public $previousPrimaryKey = 0;

	public $leftFieldName = 'lft';
	public $rightFieldName = 'rgt';

	private $lastDepth = 0;

	/**
	 * Works on assumption that it is called on each node as nodes are visited depth-first...
	 */
	public function next($node, &$output_array)
	{
		$data = $node->data;
		if ($this->generatePrimaryKey) {
			$data[$this->primaryKeyName] = ++$this->previousPrimaryKey;
		}
		if ($node->depth > $this->lastDepth) {
			$this->lft++;
		}
		else if ($node->depth < $this->lastDepth) {
			$this->lft += 2 + ($this->lastDepth - $node->depth);
		}
		else {	// sibling leaf node
			$this->lft += 2;
		}
		$this->lastDepth = $node->depth;
		$data[$this->leftFieldName] = $this->lft;
		$data[$this->rightFieldName] = $this->lft + 1 + ($node->totalDescendents * 2);
		$output_array[] = $data;
	}
}

