<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 21:22
 * Note: index.php
 */

namespace app\contorllers;

use Core\Factory;

class category extends Factory
{
  public $tz = '*';
  /**
   * name function
   */
  public function __construct()
  {
    //var_dump(111);
  }

  public function index(): array
  {
    $url = ['ccc'=>'http://taobao.com'];
    return $url;
  }

  public function getData(): array
  {
    $url = ['ddd'=>'http://taobao.com'];
    return $url;
  }
}
