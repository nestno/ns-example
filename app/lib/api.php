<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 3/17/2020
 * Time: 8:15 PM
 * Note: api.php
 */

namespace app\lib;

/**
 * Class api
 *
 * 所有对外 API 暴露类请继承这个，省的写 $tz 了
 *
 * @package app\lib
 */
class api extends base
{
    public $tz = '*';
}