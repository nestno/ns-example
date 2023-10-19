<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2020/11/29
 * Time: 14:35
 * Note: c.php
 */

namespace app\contorllers;

use Core\Factory;

class c extends Factory
{

    public string $php_path = 'D:\\app\\Serv-Me\\Program\\PHP\\php.exe';

    public array $pipes = [];

    public function go()
    {

        // for ($i=0;$i<2;++$i){

        // }

        // $res = proc_open(
        //     //$this->php_path . ' ' . __DIR__ . '/b.php',
        //     $this->php_path . ' H:\\www\\ns\\api.php c/listen',
        //     [
        //         ['pipe', 'r'],
        //         ['pipe', 'w'],
        //         ['pipe', 'ab+'],
        //     ],
        //     $pipes
        // );
        for ($i = 1; $i <= 5; ++$i) {
            $this->pipes[$i]['proc'] = proc_open(
                $this->php_path . ' H:\\www\\ns\\api.php c/listen',
                [
                    ['pipe', 'r'],
                    ['pipe', 'w'],
                    ['pipe', 'r'],
                ],
                $this->pipes[$i]['pipe']
            );
        }

        $this->add();
    }

    public function listen()
    {

        while (true) {
            file_put_contents(__DIR__ . '/aaaa.log', 'TEST' . PHP_EOL, FILE_APPEND);

            $stdin = fgets(STDIN);//捕捉你的输入框内容

            echo 'RECV: ' . $stdin;

        }
    }


    public function add()
    {

        while (true) {

            $to = mt_rand(1, 5);
            $in = fgets(STDIN);
            fputs($this->pipes[$to]['pipe'][0], $in);
            $out = fgets($this->pipes[$to]['pipe'][1]);
            var_dump($to, $out);

        }
        
    }

}