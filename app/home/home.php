<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 21:22
 * Note: index.php
 */

namespace app\home;

class home
{
    public $tz = ['index'];

    public function __construct()
    {
        //var_dump(111);
    }

    public function index(): array
    {
        //$data = $this->output();
        $data = new \stdClass();
        var_dump($data);
        return json_decode($data, true);
    }

    public function output(object $data): array
    {
        $data = json_decode(json_encode($data), true);
        return $data;
    }
}