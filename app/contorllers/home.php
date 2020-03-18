<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 21:22
 * Note: index.php
 */

namespace app\contorllers;
use ext\factory;
class home extends factory
{
    public $tz = ['index'];
    public function __construct()
    {
        //var_dump(111);
    }

    public function index(): array
    {
        //$data = $this->output();

        return [12,3,4,5];
    }
}