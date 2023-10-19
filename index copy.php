<?php
$ip = '127.0.0.1';
$port = 1935;
set_time_limit(0);

// 创建 socket
if(($socket = socket_create(AF_INET,SOCK_STREAM,0)) < 0){
    echo "socket 创建失败，失败原因为：" . socket_strerror($socket) . "\n";
}
//  绑定 socket 到指定IP和端口上
if(($ret = socket_bind($socket,$ip,$port)) < 0){
    echo "socket 绑定失败，失败原因为：" . socket_strerror($ret) . "\n";
}
// 监听连接
if(($ret = socket_listen($socket,4)) < 0){
    echo "socket 监听失败，失败原因为：". socket_strerror($ret) . "\n";
}
$count = 0;
do{
// 接收请求连接
// 调用子 socket 处理信息
if(($msgsock = socket_accept($socket)) < 0){
    echo "socket_accept()失败，原因为：" . socket_strerror($msgsock) . "\n";
}else{
    $msg = " 测试成功！\n";
    // 处理客户端输入并返回数据
    socket_write($msgsock,$msg,strlen($msg));
    echo "测试成功了！";
    // 读取客户端输入
    $buf = socket_read($msgsock,8912);
    $talkback = "收到的消息：$buf\n";
    echo $talkback;
}
if(++$count > 5){
    break;
}
// 关闭socket
socket_close($msgsock);
}while(!0);
// 关闭socket
socket_close($socket);
