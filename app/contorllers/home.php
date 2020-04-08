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
        $url = [];
        //$data = $this->output();
    //$user_agent = "Mozilla/5.O (Windows NT 5.1; r:25.e) Gecko/2eleelel Firefox/25.e";
    //list($msec, $sec) = explode(' ',microtime());
    //$msectime = sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    //$ch       = curl_init();
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_REFERER, 'http://xyq.cbg.163.com/cgi-bin/xyq_overall_search.py?act=show_overall_search_role');
    //curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    //$url = "http://recommd.xyq.cbg.163.com/cgi-bin/recommend.py?callback=Request.JSONP.request_map.request_1&_=" . $msectime . "&act=recommd_by_role&server_id=229&areaid=40&page=l&query_order=selling_time+DESC&price_max=10000&price_min=10&view_loc=search_cnd&count=lS&search_type=search_role";
    //curl_setopt($ch, CURLOPT_URL, $url);
    //
    //$result = curl_exec($ch);
    //$head   = curl_getinfo($ch);

        return [$url];
    }
}