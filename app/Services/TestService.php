<?php

namespace App\Services;

use App\Models\Test;

class TestService
{
  // なんか書いてtestクラス継承できるようにしないとあかんくない？いや、いいのか　既にできるか
    public function getResult($a, $b)
    {
        return $a * $b;
    }
}