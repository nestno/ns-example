<?php

/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2020/12/2
 * Time: 21:03
 * Note: demo.php
 */

namespace app\contorllers;


use Core\OSUnit;
use Ext\libCoreApi;
use Ext\libMPC;
use Ext\libSocket;
use Core\Lib\App;
use Throwable;

class sTest
{
    /**
     * php api.php demo/go
     *
     * @return array
     */
    public function go()
    {
        $app = App::new();
        $sock = libSocket::new();

        try {
            $sock->listenTo('0.0.0.0', '2468')->setSockDebug(!0)->setHandlerClass(__CLASS__)->setServerType('ws')->setPingVal(chr(0x89) . chr(0))->run(3);
        } catch (Throwable $throwable) {
            exit($throwable->getMessage());
        }
    }


    public function a($i)
    {
        return $i;
    }

    public function bug()
    {
        // asasd(fsdsdf);
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
