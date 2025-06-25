<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Sertakan autoloader DomPDF
require_once(APPPATH . 'third_party/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Pdf extends Dompdf {
    public function __construct() {
        parent::__construct();
    }
}
