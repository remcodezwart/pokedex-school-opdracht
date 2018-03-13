<?php
class security {
	function generateCsrfToken()
	{
		$_SESSION['CRSF_TOKEN'] = md5(uniqid());
	}	

	function getCsrfToken()
	{
		$this->generateCsrfToken();
		return $_SESSION['CRSF_TOKEN'];
	}

	function validateToken()
	{
		if (isset($_POST['CRSF_TOKEN']) && $_SESSION['CRSF_TOKEN'] === $_POST['CRSF_TOKEN']) {
			return true;
		} 
		return false;	
	}
}