<?php

/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 21:22
 * Note: index.php
 */

namespace app\controllers;

use League\Plates\Engine;
use Bt\Lightbenc;
use Nervsys\Core\Factory;
use Nervsys\Ext\libHttp;
use Nervsys\Ext\libPDO;
use Calendar\Calendar as CalendarInfo;
use App\lib\Calendar;
class home extends Factory
{
  // public $tz = '*';
  private $pdo;
  private $engine;
  public const js = [0.5, 1, 1.5, 2];
  public const waters = [2, 5, 8, 10];
  public const TIMES = ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'];
  public const Texts = ['空亡：此卦最凶，算啥啥空', '大安：此封最吉，大吉大利', '流连：运气平平，凡事拖延', '速喜：上吉好卦，喜在眼前', '赤口：多有争执，事态不和', '小吉：有好结果，值得坚守'];
  public $times = 1977;
  public function __construct()
  {

    // die;
    // $this->pdo = new libPDO();
    // $pdo = new pdo();

    // die;
  }

  public function compareNum()
  {
    $water = 105;
    $essonce = 0;
    $up_water = 300;
    $up_essonce = 150;
    $type = 'yu';
    $tree_set = ['yu' => [200, 100], 'ling' => [240, 120], 'yao' => []];
    $eb = 0;
    $score = 0;
    $stemp = $wtemp = 0;
    for ($water; $water > 0; $water = $water - 5) {
      if ($essonce) {

        if ($essonce > $tree_set[$type][1]) {
          $stemp = $essonce - $tree_set[$type][1];
          $essonce = $tree_set[$type][1];
        } elseif ($stemp && $tree_set[$type][1] - $essonce >= 10) {
          $stemp -= 10;
          $essonce += 10;
        }
        if ($essonce >= 70) {
          $eb = 2;
        } elseif ($essonce >= 50) {
          $eb = 1.5;
        } elseif ($essonce >= 20) {
          $eb = 1;
        } else {
          $eb = 0.5;
        }

      } else {
        $eb = 0;
      }
      if ($water > $tree_set[$type][0]) {
        $wtemp = $water - $tree_set[$type][0];
        $water = $tree_set[$type][0];
      } elseif ($wtemp && $tree_set[$type][0] - $water >= 10) {
        $wtemp -= 10;
        $water += 10;
      }

      if ($water >= 150) {
        $tscore = 10 + 10 * $eb;
      } elseif ($water >= 100) {
        $tscore = 8 + 8 * $eb;
      } elseif ($water >= 50) {
        $tscore = 5 + 5 * $eb;
      } else {
        $tscore = 2 + 2 * $eb;
      }
      $score += $tscore;
//      var_dump($eb . '-' .$water . '-' . $essonce . '-' . $tscore . '-' . $score);
      if ($essonce) {
        $essonce -= 2;
      }
    }
    var_dump($score);
//    10 >= 150
//      8 < 150
//    5 < 100
//    2 < 50
//      200 % >= 70
//      150 % < 70
//      100 % < 50
//      50 % < 20
  }

  public function index(): array
  {
//        $result = $this->pdo->query('select * from `dt_shop_member` where id > 3 order by id desc limit 10 ');

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
    $this->engine = Engine::new();
    $calendar = Calendar::new();
    $today = $calendar->convertSolarToLunar(date('Y'),date('m'),date('d'));
    // $pre = Hook::new()->prepend;
    // var_dump(123);die;
    $currentTime = date('H', time());
    $cIndex = ceil(($currentTime % 23) / 2);
    $currentDay = date('d', time());
    $currentMonth = date('m', time());
    $year = date('Y',time());
    $days = $year - $this->times;
    $r = intval($days%4);
    $q = intval($days/4);
    $startDate = date('Y-m-d', strtotime(date('Y') . '-01-01'));
    $daysSinceStartOfYear = (time() - strtotime($startDate)) / (24 * 3600);
    $nlday = intval(fmod((14*$q+10.6*($r+1)+ceil($daysSinceStartOfYear)) , 29.5));
    $index = ($today[4] + $today[5] + $cIndex + 1) % 6;
    $url = ['currentTime' => $currentTime, 'cIndex' => self::TIMES[$cIndex], 'index' => self::Texts[$index]];

    return $url;
  }

  public function test1(): array
  {
    return [str_pad(3, 2, '0', STR_PAD_LEFT)];
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
        if ($a > $b) {
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
      $fileList = libDoc::new()->getApiList('home');
      return $fileList;
    } catch (\Throwable $th) {
      libErrno::new('msg')->set(10000, 1, $th->getMessage());
    }
  }

  public function countScore($water, $j = 0)
  {
    $count_score = 0;
    if ($water > 0) {

      while ($water) {

        $wb = $this->ws($water);
        if ($j > 0) {
          $jb = $this->bs($j);
          $wb += $wb * $jb;
        }
        $count_score += $wb;
        $water -= 5;
        $j -= 2;
      }

    }
    return $count_score;
  }

  public function bs($j)
  {
    $result = 0;
    if ($j >= 60) {
      $result = 2;
    } else if ($j >= 50 && $j < 60) {
      $result = 1.5;
    } else if ($j >= 20 && $j < 50) {
      $result = 1;
    } else if ($j > 0 && $j < 20) {
      $result = 0.5;
    }

    return $result;
  }

  public function ws($w)
  {
    $min = 2;
    if ($w >= 150) {
      $min = 10;
    } else if ($w < 150 && $w >= 100) {
      $min = 8;
    } else if ($w < 100 && $w >= 50) {
      $min = 5;
    }
    return $min;
  }

  public function calendarInfo():array 
  {
    $calendar = [];
    $calendar_info = CalendarInfo::new('demo');
    $dateTime =  new \DateTime('now + 1year');
    $calendar = $calendar_info->createCalendar(2024,3,5);
    $calendar['solar'] = $calendar_info->yearSolarTerms($dateTime);
    return $calendar;
  }
}
