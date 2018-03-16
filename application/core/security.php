<?php
class Security {
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

	public function filter($data)
	{
		if (is_string($data)) {
			return htmlentities($data, ENT_QUOTES, 'UTF-8');
		} else {
			foreach ($data as $key => &$value) {
				if (is_object($data)) {
					$data->{$key} = $this->filter($value);		
				} else if (is_array($data)) {
					$value = $this->filter($value);
				} 
			}
		}
		return $data;
	}
}