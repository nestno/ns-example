<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2020/1/13
 * Time: 13:53
 * Note: wallet_detail.php
 */

namespace app\lib\model;


use app\lib\model;

class wallet_detail extends model
{

    public function __construct()
    {
        //一定要记得实例化父类
        parent::__construct();

        //设置表名
        $this->set_table('wallet_detail_' . date("ym"));
    }
}