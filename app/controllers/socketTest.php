<?php

/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2020/12/2
 * Time: 21:29
 * Note: sock.php
 */

namespace app\contorllers;

use Ext\libSocket;

class socketTest
{
  public function go()
  {
    libSocket::new()->setHandlerClass(__CLASS__)->run();
  }


  public function onConnect($uuid)
  {
    return ['uuid' => $uuid];
  }

  public function onMessage($msg)
  {
    return json_decode($msg, true);
  }

  public function recvOnline($msg)
  {
    return 111111;
  }

  public function recvOffline($msg)
  {
    return 1111111111;
  }
}
