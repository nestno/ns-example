<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/18
 * Time: 10:34
 * Note: mapClass.php
 */

namespace app\lib;


class mapClass
{
  private $c = null;
  private $nmap = null;
  private $contorllers = 'contorllers';

  public function mapC($c): array
  {
    $this->c = $c;

    $map = [
      'contorllers\home' => [
        'index',
        'getData',
      ],
      'contorllers\category' => [
        'index',
        'getData',
      ],
    ];
    if($c)
    var_dump($this->c);
    $nmap = array_filter(
      $map,
      array($this, 'mapFilter')
    );

//    var_dump($nmap);
    return $map;
  }

  private function mapFilter($val)
  {

//      var_dump($val);
//      var_dump($this->c);
    foreach ($val as $item) {
      if ($item == $this->c) {
        return $item;
      }
    }
//      if(is_array($val)){
//        $this->nmap = array_filter($val,[$this,'mapFilter']);
//
//      }else{
//        return $this->c == $val;
//      }

  }
}
