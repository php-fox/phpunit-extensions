<?php declare(strict_types=1);

/*
 * This file is part of php-tailors/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPTailors\PHPUnit\Examples\Inheritance;

/**
 * Example class for testing purposes.
 *
 * @internal This class is not covered by the backward compatibility promise
 * @psalm-internal PHPTailors\PHPUnit
 */
final class ExampleClassUsingTrait
{
    use ExampleTrait;
}

// vim: syntax=php sw=4 ts=4 et:
