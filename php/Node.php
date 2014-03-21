<?php

namespace samyapp\hierarchical;

/**
 * A node in the hierarchy tree.
 * A tree is simply a node (and its children).
 * A node may contain an array of child nodes, together with an optional associative array of user data.
 */
class Node
{
	public $totalDescendents = 0;

	public $data = null;

	/**
	 * @var int The depth in the hierarchy of this node. 
	 * Pre-calculated by the Builder when adding the node 
	 * to avoid having to recalculate later.
	 */
	public $depth = 0;

	public $children = array();

	/**
	 *
	 * @param array $data Optional array of data for this node
	 */
	public function __construct($data = null, $depth = 0)
	{
		$this->data = $data ? $data : array();
		$this->depth = $depth;
	}
}
