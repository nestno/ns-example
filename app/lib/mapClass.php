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
    public function mapC($c): array
    {
        $map = [
            'home/index'=>[
                'contorllers/home',
                'index'
            ]
        ];
        //var_dump($c);die;
        return $map;
    }
}