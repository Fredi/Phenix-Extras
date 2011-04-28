<?php
/**
* Code base on TwigView for CakePHP by m3nt0r
*
* TwigView for CakePHP
*
* About Twig
* http://www.twig-project.org/
*
* @package app.views
* @subpackage app.views.twig
* @author Kjell Bublitz <m3nt0r.de@gmail.com>
* @link http://github.com/m3nt0r My GitHub
* @link http://twitter.com/m3nt0r My Twitter
* @license MIT License
*/
if (!defined('TWIG_VIEW_CACHE'))
	define('TWIG_VIEW_CACHE', TMP.DS.'twig');

/**
 * Load the Twig Autoloader class
 */
require ROOT.DS."vendor".DS."Twig".DS."lib".DS."Twig".DS."Autoloader.php";

Twig_Autoloader::register();

class TwigView extends View
{
	private $Twig;

	public $ext = '.tpl';

	public static $twigOptions = array();

	public function __construct(&$controller)
	{
		parent::__construct($controller);

		$loader = new Twig_Loader_Filesystem(VIEWS_PATH);

		// setup twig and go.
		$this->Twig = new Twig_Environment($loader, array_merge(array(
				'cache' => TWIG_VIEW_CACHE,
				'charset' => 'UTF-8'
			), self::$twigOptions)
		);
	}

	public function _render($__viewFile, $__viewVars)
	{
		$file = str_replace(VIEWS_PATH.DS, "", $__viewFile);
		$template = $this->Twig->loadTemplate($file);
		return $template->render($__viewVars);
	}
}
