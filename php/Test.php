<?php

namespace samyapp\hierarchical;

require dirname(__FILE__).'/Node.php';
require dirname(__FILE__).'/Builder.php';

$data = array(
array( 'depth' => 1, 'name' => 'root'),
array( 'depth' => 2, 'name' => 'child1'),
array( 'depth' => 3, 'name' => 'grandchild1.1'),
array( 'depth' => 3, 'name' => 'grandchild1.2'),
array( 'depth' => 2, 'name' => 'child2'),
array( 'depth' => 3, 'name' => 'grandchild2.1'),
array( 'depth' => 3, 'name' => 'grandchild2.2'),
array( 'depth' => 2, 'name' => 'child3'),
array( 'depth' => 3, 'name' => 'grandchild3.1'),
array( 'depth' => 3, 'name' => 'grandchild3.2')
);

$builder = new Builder();
$builder->build($data);

walk($builder->tree);

function walk($node)
{
	foreach ($node->children as $item) {
		echo str_repeat('-', $item->data['depth']) . $item->data['name'] . "\n";
		walk($item);
	}
}

