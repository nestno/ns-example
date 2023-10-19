<?php

namespace app\contorllers;

use Core\Factory;
use app\contorllers\go;

class a extends Factory
{
  public function index()
  {
    $time = microtime(true);
    $num = 0;
    for($i = 0;$i<100000;$i++){
      $num += $this->ftn2(13);
    }
    var_dump($num);
    var_dump("完成时间：".(microtime(true) - $time));

  }

  private function ftn(int $num)
  {
    if ($num == 1 || $num == 2) {
      return 1;
    }
    $first = 1;
    $second = 1;
    for ($i = 3; $i <= $num; $i++) {
      $second = $first + $second;
      $first = $second - $first;
    }

    return $second;
  }
  private function ftn2(int $num){
    if($num == 1 || $num == 2){
      return 1;
    }
    return $this->ftn2($num -1) + $this->ftn2($num -2);
  }
}
