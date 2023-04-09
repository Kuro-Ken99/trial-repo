<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function getResult($a, $b)
    {
        return $this->testService->getResult($a, $b);
    }
    //
    public function show() {
        $test = Test::all()
              ->toArray();

        return view('test') -> with('test', $test);
    }

    public function pokemon(Request $request) {
      $id = $request['id'];
      $url = "https://pokeapi.co/api/v2/pokemon/{$id}";

      $ch = curl_init();

      $timeout = 5;

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
      $data = curl_exec($ch);

      $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      if ($http_code != 200) {
          // return http code and error message
          return json_encode([
              'code'    => $http_code,
              'message' => $data,
          ]);
      }

      $data = json_decode($data, true);
      return redirect('/') -> with('pokemon', $data);
    }

    
}
