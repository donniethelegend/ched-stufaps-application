<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once 'dompdf/autoload.inc.php';
require_once "dompdf/lib/html5lib/Parser.php";
require_once "dompdf/lib/php-font-lib/src/FontLib/Autoloader.php";
require_once "dompdf/lib/php-svg-lib/src/autoload.php";
require_once "dompdf/src/Autoloader.php";
require_once "dompdf/src/FontMetrics.php";
Dompdf\Autoloader::register();

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\FontMetrics;

class Pdf extends Dompdf
{
	public function __construct()
	{
		 parent::__construct();
	} 
}

?>