<?php

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

require dirname(__DIR__).'/NervSys/NS.php';
var_dump(124);die;
$ns = new Nervsys\NS();

$ns->CorsAddRecord('*')
  ->AppSetCoreDebug(true)
  ->IODataReadHeaderKeys('X-Requested-With')
  ->IODataReadCookieKeys('ATK', 'UTK', 'Authorization')
  ->IODataSetContentType('application/json')->AppSetApiPath('app/controllers')->addAutoloadPath($ns->app->root_path.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'lib');

$ns->go();

