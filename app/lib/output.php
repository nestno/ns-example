<?php

/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/18
 * Time: 10:35
 * Note: output.php
 */

namespace app\lib;

// use League\Plates\Engine as engine;
use Core\Lib\IOUnit;
use JetBrains\PhpStorm\NoReturn;

class output
{
    #[NoReturn] public function index(IOUnit $io_unit): void
    {


        if (!empty($io_unit->output_handler)) {
            call_user_func($io_unit->output_handler, $io_unit);
        }

        !headers_sent() && header('Content-Type: ' . $io_unit->content_type . '; charset=utf-8');

        $data = 1 === count($io_unit->src_output) ? current($io_unit->src_output) : $io_unit->src_output;

        if (!empty($io_unit->src_msg)) {
            $data = $io_unit->src_msg + ['data' => $data];
        }

        switch ($io_unit->content_type) {
            case 'application/json':
                echo json_encode($data, JSON_FORMAT);
                break;

            case 'application/xml':
                echo $io_unit->toXml((array)$data);
                break;

            case 'text/plain':
                echo is_array($data) ? $io_unit->toString($data) : (string)$data;
                break;

            case 'text/html':
                if (is_string($data) || is_numeric($data)) {
                    echo $data;
                } elseif (isset($data['data']) && is_string($data['data'])) {
                    echo $data['data'];
                } elseif (is_array($data) && is_string($res = current($data))) {
                    echo $res;
                } else {
                    echo 'Invalid HTML Page!';
                }
                break;

            default:
                echo '"' . $io_unit->content_type . '" NOT support!';
                break;
        }

        unset($data, $res);
        // die;
    }

    public function index1(object $data): void
    {

        $context = [
            //Memory & Duration
            'Peak'     => round(memory_get_peak_usage() / 1048576, 4) . 'MB',
            'Memory'   => round(memory_get_usage() / 1048576, 4) . 'MB',
            'Duration' => round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 4) . 'ms',
        ];
        echo '<pre>';
        var_dump($context);
        // echo json_encode($data->src_output[$data->src_cmd]);
    }
}
