<?php declare(strict_types=1);

/*
 * This file is part of php-tailors/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPTailors\PHPUnit\Constraint;

use PHPTailors\PHPUnit\Inheritance\AbstractConstraint;
use PHPTailors\PHPUnit\Inheritance\ConstraintImplementationTrait;

/**
 * Constraint that accepts classes that extend given class.
 */
final class UsesTrait extends AbstractConstraint
{
    use ConstraintImplementationTrait;

    /**
     * @var string
     */
    private static $verb = 'uses trait';

    /**
     * @var string
     */
    private static $negatedVerb = 'does not use trait';

    /**
     * @var array
     * @psalm-var array{0:callable, 1:string}
     */
    private static $validation = ['trait_exists', 'a trait-string'];

    /**
     * @var callable
     * @psalm-var callable
     */
    private static $inheritance = 'class_uses';

    /**
     * @var array
     * @psalm-var array{0:callable, 1:callable}
     */
    private static $supports = ['class_exists', 'trait_exists'];
}

// vim: syntax=php sw=4 ts=4 et:
