<?php


namespace App;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class WinthorApi
{

  public $client;

  /**
   */
  public $token;

  public function __construct()
  {
    $this->client = new Client();

    $this->token = Cache::remember('token', 60, function () {
      $response = $this->client->post(config('api.winthor.url') . "v1/login", [
        'form_params' => [
          'email'    => config('api.winthor.login'),
          'password' => config('api.winthor.password'),
        ]
      ]);

      $data = json_decode($response->getBody()->getContents(), true);
      if ($data['access_token']) {
        return $data['access_token'];
      }
    });
  }

  public function iberostar()
  {

    return $this->client->get(config('api.winthor.url') . "metatv/iberostar", [
      'headers' => [
        'Authorization' => 'Bearer ' . $this->token
      ]
    ]);
  }

  public function iberostar2()
  {

    return $this->client->get(config('api.winthor.url') . "metatv/iberostar2", [
      'headers' => [
        'Authorization' => 'Bearer ' . $this->token
      ]
    ]);
  }

}
