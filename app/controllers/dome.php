<?php
/**
 * Created by PhpStorm.
 * User: 12271
 * Date: 2021/1/30
 * Time: 15:05
 * Note: dome.php
 */

namespace app\contorllers;

use Core\Factory;
use Ext\libSocket;


class dome extends Factory
{
  public function a(): void
  {
    //libSocket::new()->listenTo("127.0.0.1", 2468)->run();
    //$tk = libSocket::new()->addMpc('dome/bug', ['a' => '11']);
    //var_dump($tk);
    var_dump(pack('C*', 82, 72, 80));
  }

  /**
   * @param $a
   *
   * @return mixed
   */
  public function bug($a)
  {
    return $a;
  }
}
