<?php
class Posts extends BaseModel
{
	protected $__filters = array(
		'text' => 'raw' // let's allow html in the text field
	);
	protected $__validations = array(
		'title' => array(
			'presence' => array(),
			'length' => array('in' => array(3, 150), 'message' => 'Minimum 3 characters and maximum 150.'),
		),
		'text' => array('presence' => array()),
		'author' => array(
			'presence' => array(),
			'length' => array('max' => 50, 'message' => 'Maximum 50 characters.')
		)
	);
}
