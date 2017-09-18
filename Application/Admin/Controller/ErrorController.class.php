<?php
namespace Admin\Controller;

class ErrorController extends Controller {
    public function error(){
   		$this->display();
   	}
    
    public function success(){
    	$this->display();
    }
}