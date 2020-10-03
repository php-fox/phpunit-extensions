<?php declare(strict_types=1);

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$srcdirs = ['packages/*'];
$srcdirs = array_map(function ($p) {
  return __DIR__ . "/../../" . $p;
}, $srcdirs);

$iterator = Finder::create()
  ->files()
  ->name("*.php")
  ->exclude("tests")
  ->exclude("resources")
  ->exclude("behat")
  ->exclude("vendor")
  ->in($srcdirs);

return new Sami($iterator, array(
  'theme'     => 'default',
  'title'     => 'PHPUnit Extensions API',
  'build_dir' => __DIR__ . '/../build/local/html/api',
  'cache_dir' => __DIR__ . '/../cache/local/html/api'
));
