<?php 

  namespace BrianAlzateDeveloper\ApiSmsRest\Services;

  class ApiSmsRestServices
  {
    protected $url;
    
    // authenticate user

    public function authApiSms($user,$password)
    {
      $url = $this->url . 'login';

      $data = [
          'email' => $user,
          'password' => $password
      ];

      return $this->curlApiSms($url,$data);

    }

    // crud of contacts

    public function contactsApiSms($user,$data,$routes,$action)
    {
      $url = $this->url . $routes;

      if($action == 'create')
      {
          $data = [
              'user' => $user,
              'data' => $data
          ];
      }

      if($action == 'update')
      {
          $data = [
              'user' => $user,
              'data' => $data
          ];
      }

      if($action == 'delete')
      {
          $data = [
              'user' => $user,
              'id' => $data
          ];
      }
      

      return $this->curlApiSms($url,$data);
    }

    // curl Api Sms

    public function curlApiSms($url,$data)
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
          "Authorization: Basic ",
          "Cache-Control: no-cache",
          "Content-Type: application/json",
        ),
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false, 
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if($err)
      {
        return json_encode(['message' => 'cURL Error #:'.$err, 'type' => 'error']);
      } 
      else
      {
        $info = json_decode($response);

        if(empty($info->error))
        {
            return json_encode(['data' => json_decode($response), 'type' => 'success']);
        }
        else
        {
            return json_encode(['message' => $info->error->message, 'type' => 'error']);
        }
      }

    }

  }

?>