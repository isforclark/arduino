<?php
//**  https://github.com/chriskacerguis/codeigniter-restserver   **/
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require ('simple_html_dom.php');

//require APPPATH . '/libraries/Facebook/autoload.php';
class PMController extends Rest_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();			
	}

	public function getSkill_get($url = 'http://taqm.epa.gov.tw/pm25/tw/PM25A.aspx?area=10'){
		if($url===null)
			$url = $this->get('url');
		$html = file_get_html($url);
		$data = $html->find("table[class='TABLE_G'] tbody tr");
		echo "[";
		foreach(array_slice($data,1) as $element){
			echo  '{"sitename":"' . $element->children(0)->children(0)->innertext .'",';	
			echo  '"immediate":"' . $element->children(1)->children(0)->innertext . '",' ;	
			echo  '"onehourago":"' . $element->children(2)->children(0)->innertext . '"},';		
		}
		echo "]";
	}
}
?>