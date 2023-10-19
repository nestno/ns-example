<?php

namespace app\contorllers;

use Core\Lib\App;
use Core\Factory;
use Ext\libSocket;
use Throwable;
use Core\Lib\IOUnit;
use Ext\libRedis;

class cSock extends Factory
{
    const MSG_TYPE_TEXT = 1;
    const MSG_TPYE_IMG = 2;
    const MODE_CHAT = 1;
    const MODE_GROUP = 2;
    const MSG_TYPE_HEARTBEAT = -1;
    const MSG_TYPE_NOTICE = -2;
    const MSG_TYPE_SYSTEM = -3;
    public libRedis $redis;

    function __construct()
    {
        $this->redis = libRedis::new();
    }
    function go()
    {
        try {
            $app = App::new();
            $sock = stream_socket_client('tcp://192.168.123.110:2468', $errno, $errstr);
            $abc = json_decode(fread($sock, 1024), true);
            $data = ['to_sid' => $abc['to_sid'], 'type' => -1, 'uid' => libSocket::new()->genId()];
            echo json_encode($data);
            fwrite($sock, json_encode($data));
            $result = fread($sock, 1024);
            echo $result;
            fclose($sock);
        } catch (Throwable $thorw) {
            exit($thorw->getMessage());
        }
    }
    function onMessage(string $sid, string $msg)
    {
        $msg_data = json_decode($msg, true);
        $msg_data['type'] ??= 1;
        if (self::MSG_TYPE_HEARTBEAT === $msg_data['type']) {
            $msg_data['to_sid'] = $sid;
            return $msg_data;
        }
        $msg_data['mode'] ??= self::MODE_CHAT;
        switch ($msg_data['mode']) {
            case self::MODE_CHAT:
                break;
            default:
        }
    }
}
