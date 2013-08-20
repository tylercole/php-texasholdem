<?php
namespace THE\tests;
use Symfony\Component\ClassLoader as cl;

// start output buffering
ob_start();

// Set the default timezone
date_default_timezone_set('America/Los_Angeles');

require_once __DIR__.'/../library/Symfony/ClassLoader/UniversalClassLoader.php';
$loader = new cl\UniversalClassLoader();

$loader->registerNamespaces(array(
    'THE' => __DIR__.'/../library',
));
$loader->register();
