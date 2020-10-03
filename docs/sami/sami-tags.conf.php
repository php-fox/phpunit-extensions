<?php

use Sami\Sami;
use Sami\Version\GitVersionCollection;
use Sami\RemoteRepository\GitHubRemoteRepository;
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

$versions = GitVersionCollection::create($dir)
          ->addFromTags()
          ->add('master', 'master branch')
          ->add('devel', 'devel branch');

return new Sami($iterator, array(
  'theme'     => 'default',
  'versions'  => $versions,
  'title'     => 'PHPUnit Extensions API',
  'build_dir' => __DIR__ . '/../build/%version%/html/api',
  'cache_dir' => __DIR__ . '/../cache/%version%/html/api',
  'remote_repository' => new GithubRemoteRepository('korowai/framework')
));
