<?php

/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 21:22
 * Note: index.php
 */

namespace app\contorllers;

// use League\Plates\Engine;
use Bt\Lightbenc;
use Nervsys\Core\Factory;
use Nervsys\Ext\libHttp;
use Nervsys\Ext\libPDO;
class home extends Factory
{
    // public $tz = '*';
    private $pdo;
    private $engine;
    public function __construct()
    {

        // die;
        // $this->pdo = new libPDO();
        // $pdo = new pdo();

        // die;
    }

    public function index(): array
    {
        $result = $this->pdo->query('select * from `dt_shop_member` where id > 3 order by id desc limit 10 ');

        // foreach($result as $row){
        //   var_dump($row);
        //   echo '<hr>';
        // }
        // var_dump(234);

        // try {

        //     var_dump($this->fbn(100));
        // } catch (\Exception $error) {
        //     var_dump($error);
        // }
        // die;
        // debug_print_backtrace();
        // $this->pdo = libPDO::new()->connect();
        // $this->engine = Engine::new();
        // $pre = Hook::new()->prepend;
        // var_dump(123);die;
        $url = ['bbb' => 'http://taobao22.com', 'cc' => $this->fbn(3), 'name' => 'jerry', 'company' => '迪淘科技'];

        // var_dump($this->engine);
        return $url;
    }

    public function loadradio()
    {
        $ghttp = libHttp::new();
        // for ($i = 1; $i < 27; $i++) {
        //     # code...
        //     $url = 'https://online2.tingclass.net/lesson/shi0529/0008/8556/' . $i . '.mp3';
        //     file_put_contents($i . '.m', $ghttp->fetch('http://down.chinavoa.com/voadownload/voams/www.chinavoa.com202007ms.rar'));
        // }

        $body = $ghttp->fetch('http://xyl.kb.com/index.php?_mall_id=1&r=api/index/index-wechat');
        var_dump($body);
        // file_put_contents('1111.rar', $ghttp->fetch('http://down.chinavoa.com/voadownload/voams/www.chinavoa.com202007ms.rar'));
        return [];
    }

    public function test(): array
    {
        $ghttp = libHttp::new();
        $purl = 'https://www.tingchina.com/yousheng/29911/';
        $pbody = $ghttp->fetch($purl . 'play_29911_185.htm');
        preg_match_all("/href=\"play_\d+_\d+\.\w+\">([0-9][0-9][0-9]\.mp3)<\/a>?/", $pbody, $arr);
        preg_match("/fileUrl=\s*\"(.*\.mp3)\";/i", $pbody, $aa);
        list($name, $s) = explode(';', $aa[1]);
        $name = substr($name, 0, strrpos($name, '/') + 1);
        $baseUrl = 'https://t3344t.tingchina.com';
        $corNum = 620;
        foreach ($arr[1] as $url_s) {
            preg_match('/\d+/', $url_s, $num);
            if ($num[0] == $corNum) {
                $ppbody = $ghttp->fetch($baseUrl . $name . $url_s);
                file_put_contents('./' . $url_s, $ppbody);
            }
            // die;

        }
        die;
        return [];
    }
    public function fbn(int $int): float
    {

        if (0 == $int || 1 == $int) {
            return $int;
        }

        $first = 0;
        $sencod = 1;

        for ($i = 0; $i < $int - 1; $i++) {

            $mid = $sencod;
            $sencod = $mid + $first;
            $first = $mid;
        }
        return $sencod;
    }

    public function getData(): array
    {

        $url = ['aaa' => 'http://taobao.com', 'bbb' => $this->fbn(23)];
        return $url;
    }

    public function str2py(): array
    {
        set_time_limit(0);
        // 小内存型
        // $pinyin = new Pinyin(); // 默认
        // 内存型
        // $pinyin = new Pinyin('\\Overtrue\\Pinyin\\MemoryFileDictLoader');
        // // $str = $pinyin->convert('带着希望去旅行，比到达终点更美好');
        // $arr = @file(ROOT . '/dict.txt');
        // // var_dump(implode("\t",$str));die;
        // $bool = 0;
        // foreach ($arr as $v) {
        //     preg_match('/([\x{4e00}-\x{9fa5}]+).+\s+([0-9]+)/u', $v, $narr);
        //     if(!count($narr)){
        //       continue;
        //     }

        //     if($narr[1] == '瑞丰琴行'){
        //       $bool = 1;
        //       continue;
        //     }
        //     if($bool){
        //       $str = implode(" ",$pinyin->convert($narr[1]));
        //       $nstr = $narr[1]."\t".$str."\t".$narr[2]."\r\n";
        //       file_put_contents('dict1.txt', $nstr, FILE_APPEND);
        //     }

        // }

        // echo 'done';
        // I/O型
        // $pinyin = new Pinyin('\\Overtrue\\Pinyin\\GeneratorFileDictLoader');
        // $a = ['getData','index'];
        // $b = ['getdata','irndex'];
        // $c = array_intersect(array_map('strtolower',$a),array_map('strtolower',$b));

        // $dict1 = readfile('./ndict.txt');
        $dict1 = fopen('./aaa.txt', 'r');
        while (!feof($dict1)) {
            $dict1_arr[] = fgets($dict1, 1024);
        }
        $nstr = '';
        $narr = [];

        foreach ($dict1_arr as $k => $dv2) {

            // $dv2_arr = explode("\t",$dv2);
            // $key = $dv2_arr[0]."\t".$dv2_arr[1];

            $dv2_arr = explode("\t", $dv2);
            $aaa = $dv2_arr[0] . "\t" . $dv2_arr[1];


            if (array_key_exists($aaa, $narr)) {
                $a = intval($narr[$aaa]);
                $b = intval($dv2_arr[2]);
                if ($a  > $b) {
                    continue;
                } else {
                    $narr[$aaa] = $dv2_arr[2];
                }
            } else {

                $narr[$aaa] = $dv2_arr[2];
            }
        }

        foreach ($narr as $kn => $v) {
            $data = $kn . "\t" . $v;
            file_put_contents('./aaa1.txt', $data, FILE_APPEND);
        }
        die;
        echo 'done';
        $url = ['msg' => 'done'];
        return $url;
    }
    public function getMagnet()
    {
        // $path = "D:/Desktop/12ab2f346664770a9b640ab885014cc4.torrent";//此处填写种子的地址
        try {
            $info = Lightbenc::new()->bdecode_getinfo($_FILES['file']['tmp_name']);
            $magnet = sprintf('magnet:?xt=urn:btih:%s', strtoupper($info['info_hash']));
            return ['magnet' => $magnet];
        } catch (\Throwable $th) {
            //throw $th;
            libErrno::new('msg')->set(10000, 1, $th->getMessage());
        }
    }
    /**
     * getDoc
     *
     * @return array
     */
    public function getDoc(): array
    {
        try {
            $fileList =  libDoc::new()->getApiList('home');
            return $fileList;
        } catch (\Throwable $th) {
            libErrno::new('msg')->set(10000, 1, $th->getMessage());
        }
    }
}
