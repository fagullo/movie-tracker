<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    //The number og movies to show by page
    'page_size' => 15,

    'feed' => 'imdb_top250.json',

    'top-movies-count' => 5,

    'trending-movies-count' => 5,

    'trending-movies-days' => 7,


];
