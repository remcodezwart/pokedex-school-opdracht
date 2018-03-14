<?php
class ErrorController extends controller {
	
	public function pageNotFound() {
		$this->render('errors/notFound');
	}	

}