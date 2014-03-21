<?php

namespace samyapp\hierarchical;

error_reporting(E_ALL);

require dirname(__FILE__).'/Node.php';
require dirname(__FILE__).'/Builder.php';
require dirname(__FILE__).'/CSVTransformer.php';
require dirname(__FILE__).'/AdjacencyListPreparer.php';
require dirname(__FILE__).'/NestedSetPreparer.php';

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
$tree = $builder->build($data);

//$preparer = new AdjacencyListPreparer();
$preparer = new NestedSetPreparer();
$preparer->generatePrimaryKey = false;
$output = array();
$builder->walk($tree, $preparer, $output);

$transformer = new CSVTransformer();
$transformer->output($output);

//$builder->walk($builder->tree, $transformer);


