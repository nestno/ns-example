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
    private $f = null;
    private $nmap = null;
    private $col = 'contorllers';

    public function mapC($c): array
    {
        if (strpos($c, '/') === false) {
            $f = 'index';
        } else {
            list($c, $f) = explode('/', $c);
        }

        $hook = [
            'h' => 'home',
            'c' => 'category',
        ];

        $key = '';

        if ($hook[$c]) {
            $key = $this->col . "\\" . $hook[$c];
        }

        $map[$key] = [$f];

        return $map;
    }

}
