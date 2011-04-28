<?php
/**
 * Load the Smarty class
 */
require ROOT.DS."vendor".DS."Smarty".DS."libs".DS."Smarty.class.php";

class SmartyView extends View
{
	private $Smarty;

	public $ext = '.tpl';

	public function __construct(&$controller)
	{
		parent::__construct($controller);

		$this->Smarty = new Smarty();

		$this->Smarty->compile_dir = TMP.DS.'smarty'.DS.'compile'.DS;
		$this->Smarty->cache_dir = TMP.DS.'smarty'.DS.'cache'.DS;
	}

	public function _render($__viewFile, $__viewVars)
	{
		foreach($__viewVars as $data => $value)
		{
			if (!is_object($data))
				$this->Smarty->assign($data, $value);
		}

		$this->Smarty->assignByRef('view', $this);

		return $this->Smarty->fetch($__viewFile);
	}
}
