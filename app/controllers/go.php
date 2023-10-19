<?php


namespace app\contorllers;

use Ext\libMPC;

class go
{
  public function o()
  {

    $mpc = libMPC::new();

    $mpc->setPhpPath('D:\\app\\Serv-Me\\Program\\PHP\\php.exe')
      ->setProcNum(10)
      ->start();
    $time = microtime(true);
    for ($i = 0; $i < 1700; $i++) {

      $ticket1 = $mpc->addJob('go/ftn', ['num' => 13]);

    }
    var_dump(microtime(true) - $time);
//    $ticket1 = $mpc->addJob('go/test', ['name' => str_pad('AA',41.3*1024*1024,"."), 'age' => 11]);
//    $ticket2 = $mpc->addJob('go/test', ['name' => 'BB', 'age' => 22]);
//    $ticket3 = $mpc->addJob('go/test', ['name' => 'CC', 'age' => 33]);
//    $ticket4 = $mpc->addJob('go/test', ['name' => 'DD', 'age' => 44]);
//    $ticket5 = $mpc->addJob('go/test', ['name' => 'EE', 'age' => 55]);
//    $ticket6 = $mpc->addJob('go/test', ['name' => 'FF', 'age' => 66]);
//    $data5 = $mpc->fetch($ticket5);
//    $data2 = $mpc->fetch($ticket2);
//    $data1 = $mpc->fetch($ticket1);
//    $data4 = $mpc->fetch($ticket4);
//    $data6 = $mpc->fetch($ticket6);
    $time2 = microtime(true);

    $data1 = $mpc->fetch($ticket1);
    var_dump(microtime(true) - $time2);
//    var_dump(strlen($data1), $data2, $data3, $data4, $data5, $data6);
    var_dump($data1);
//    var_dump(microtime(true) - $time);
  
  }

  public function ftn(int $num)
  {
    $num = $this->ftn2($num);
    return ['num' => $num];
  }

  private function ftn2(int $num)
  {
    if ($num == 1 || $num == 2) {
      return 1;
    }

    return $this->ftn2($num - 1) + $this->ftn2($num - 2);
  }

  public function test(string $name, int $age)
  {

//    sleep(1);

    return ['name' => $name, 'age' => $age];

  }
}
