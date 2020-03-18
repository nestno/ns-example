<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2020/2/18
 * Time: 14:31
 * Note: info.php
 */

namespace app\lib\model;


use app\lib\model;

class user_info extends model
{

    public function info($user_id)
    {


        return $this->select('user_wechat a')->fields('a.nickName,b.nick_name')->join('user_info b', ['a.user_id', 'b.user_id'], 'left')->where([
            'a.user_id', $user_id
        ])->fetch_row();
    }

}