<?php

namespace app\contorllers;

use Core\Factory;
use Ext\libMPC;
use Ext\libRedis;
use Ext\libSockOnRedis;
use Ext\libSocket;
use Throwable;
use Core\OSUnit;

class sSock extends libSockOnRedis
{
    const MODE_CHAT = 1;
    const MODE_GROUP = 2;

    const MSG_TYPE_TEXT = 1;
    const MSG_TYPE_IMG = 2;
    const MSG_TYPE_HEARTBEAT = -1;
    const MSG_TYPE_NOTICE = -2;
    const MSG_TYPE_SYSTEM = -3;
    public libRedis $credis;
    public function __construct()
    {
        $this->credis = libRedis::new();
        $this->libMPC = libMPC::new()->setPhpPath(OSUnit::new()->getPhpPath())->start($this->mpc_fork, $this->mpc_exec);
        $this->setTimeout(1)->setLogLevels('Error, Start, Listen, Accept, Connect, Handshake, Heartbeat, Receive, Send, Close, Exit')->bindRedis($this->credis->connect())->setSocketHandler($this);
        parent::__construct('0.0.0.0', 2468);
    }
    function go()
    {
        try {
            $this->start('1G', 1);
        } catch (Throwable $throw) {
            exit($throw->getMessage());
        }
    }
    function onConnect(string $sid): void
    {
        $this->transMsg($sid, json_encode(['sid' => $sid, 'online' => true]));
    }
    function onHandshake(string $sid, string $proto): bool
    {
        return true;
    }
    function onMessage(string $sid, string $msg): void
    {
        $msg_data = json_decode($msg, true);
        //默认文本消息
        $msg_data['type'] ??= 1;
        //心跳，直接返回
        if (self::MSG_TYPE_HEARTBEAT === $msg_data['type']) {
            $msg_data['to_sid'] = $sid;
            $this->transMsg($sid, json_encode($msg_data));
        }
        //聊天模式
        $msg_data['mode'] ??= self::MODE_CHAT;
        $msg_data['to_sid'] = $msg_data['uid'];
        $this->transMsg($sid, json_encode($msg_data));
    }
    function onClose(string $sid): void
    {
        $data = ['sid' => $sid, 'online' => true];
        echo 'sid:' . $sid . '离线' . "\r\n";
        $this->transMsg($sid, '断开连接！' . "\r\n");
    }
}
