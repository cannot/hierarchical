<?php

namespace samyapp\hierarchical

/**
 * A node in the hierarchy tree.
 * A tree is simply a node (and its children).
 * A node may contain an array of child nodes, together with an optional associative array of user data.
 */
class Node
{
	public $children = array();
	public $data = null;

	/*
	 *
	 * @param array $data Optional array of data for this node
	 */
	public function __construct($data = null)
	{
		$this->data = $data;
	}
}
