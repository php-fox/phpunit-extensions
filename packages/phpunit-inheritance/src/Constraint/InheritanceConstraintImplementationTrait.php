<?php

declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Constraint;

use PHPFox\PHPUnit\StringArgumentValidator;

/**
 * Implementation of an inheritance constraint class.
 *
 * The trait expects the following static attributes to be present::
 *
 *      private static $verb;           // for example $verb = 'extends class';
 *      private static $negatedVerb;    // for example $negatedVerb = 'does not extend class';
 *      private static $validation;     // for example $validation = ['class_exists', 'a class-string'];
 *      private static $inheritance;    // for example $validation = 'class_parents';
 *      private static $supports;       // for example $supports = ['class_exists'];
 */
trait InheritanceConstraintImplementationTrait
{
    /**
     * @throws \PHPFox\PHPUnit\InvalidArgumentException
     *
     * @psalm-assert class-string $expected
     */
    public static function create(string $expected): self
    {
        self::getValidator()->validate(1, $expected);

        return new self($expected);
    }

    /**
     * Returns short description of what we examine, e.g. ``'impements interface'``.
     */
    protected function verb(): string
    {
        return self::$verb;
    }

    /**
     * Returns short negated description of what we examine, e.g. ``'does not impement interface'``.
     */
    protected function negatedVerb(): string
    {
        return self::$negatedVerb;
    }

    /**
     * {@inheritdoc}
     */
    protected function inheritance(string $class): array
    {
        return call_user_func(self::$inheritance, $class);
    }

    /**
     * Checks if *$subject* may be used as an argument to inheritance().
     *
     * @psalm-assert-if-true class-string|trait-string $subject
     */
    protected function supports(string $subject): bool
    {
        foreach (self::$supports as $function) {
            if (call_user_func($function, $subject)) {
                return true;
            }
        }

        return false;
    }

    private static function getValidator(): StringArgumentValidator
    {
        return new StringArgumentValidator(...self::$validation);
    }
}

// vim: syntax=php sw=4 ts=4 et:
