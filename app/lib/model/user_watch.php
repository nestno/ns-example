<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2020/2/18
 * Time: 15:13
 * Note: user_watch.php
 */

namespace app\lib\model;


use app\lib\model;

class user_watch extends model
{

    public function __construct($user_id)
    {

        //一定要记得实例化父类
        parent::__construct();

        //设置表名
        $this->set_table('user_watch_' . substr($user_id, 0, 1));
    }


}