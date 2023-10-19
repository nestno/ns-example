<?php
error_reporting(E_ALL);
echo "<h2>TCP/IP Connection</h2>\n";
$ip = '127.0.0.1';
$port = 1935;
// 超时设置
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
    echo "socket_create()失败，原因是：" . socket_strerror($socket) . "\n";
} else {
    echo "OK!\n";
}
echo "尝试连接 '$ip' 端口 '$port'... \n";
$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo " socket_connect()失败，原因是：" . socket_strerror($result) . "\n";
} else {
    echo "连接OK！\n";
}
$in = "开始：\r\n";
$in .= "创建一个socket 客户端成功！\r\n";
$out = '';
if (!socket_write($socket, $in, strlen($in))) {
    echo "socket 写入失败，原因为：" . socket_strerror($socket) . "\n";
} else {
    echo "发送到服务器信息成功！\n";
    echo "发送的内容为：<font color='red'>$in</font><br>";
}
while ($out = socket_read($socket, 8192)) {
    echo "接收服务器回传信息成功！\n";
    echo "接收的内容为：" . $out . "\n";
}
echo "关闭 SOCKET...\n";
socket_close($socket);
echo "关闭OK！\n";
