<?php
class errorController extends controller {
	
	public function pageNotFound() {
		$this->render('errors/notFound');
	}	

}