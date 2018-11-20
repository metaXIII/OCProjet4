<?php
use metaxiii\blog\Autoloader;

include 'controller/list.php';
require 'model/Autoloader.php';

Autoloader::register();

require "controller/routes.php";



