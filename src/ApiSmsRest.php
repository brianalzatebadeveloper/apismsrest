<?php 
	
	namespace BrianAlzateDeveloper\ApiSmsRest;

	use BrianAlzateDeveloper\ApiSmsRest\Services\ApiSmsRestServices;

	class ApiSmsRest extends ApiSmsRestServices
	{
		public function __construct($url)
		{
			$this->url = $url;
		}

		// authenticate user

		public function loginApiSms($user,$password)
		{
			return $this->authApiSms($user,$password);
		}

		// crud of contacts

		public function contactsRequest($user,$data,$routes,$action)
		{
			return $this->contactsApiSms($user,$data,$routes,$action);
		}
	}



?>