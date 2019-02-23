<?php
/*
 * All rights reserved. See copyright notice in LICENSE.
 */

//Session has to be started here before the headers are sent
session_cache_limiter(false);
session_start();

require __DIR__ . '/../vendor/autoload.php';
