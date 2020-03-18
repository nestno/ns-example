<?php
/**
 * Created by PhpStorm.
 * User: abing
 * Date: 2020/3/17
 * Time: 16:58
 * Note: index.php
 */
/**
 * API Entry script example
 *
 * Copyright 2016-2019 Jerry Shaw <jerry-shaw@live.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

//Set error_reporting level
error_reporting(E_ALL);

//Load main script
require __DIR__ . '/system/core/ns.php';

\ext\core::autoload('app/lib');
//\ext\core::autoload('app/home');
//Register custom router if needed
\ext\core::register_router_function([new \app\lib\mapClass(), 'mapC']);

//Set custom output handler if needed
\ext\core::set_output_handler([new \app\lib\output(), 'index']);

//Boot NS
new \core\ns();


