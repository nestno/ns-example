<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/18
 * Time: 10:35
 * Note: output.php
 */

namespace app\lib;


class output
{
    public function index(object $data): void
    {
        $data = json_decode(json_encode($data), true);
        //echo '<pre>';

        $views = new \League\Plates\Engine(ROOT . '/app/' . 'views');
        //// Preassign data to the layout
        $views->addData(['company' => 'The Company Name'], 'layout/layout');
        //
        //// Render a template
        echo $views->render('home/index', ['name' => 'Jonathan1']);
    }
}