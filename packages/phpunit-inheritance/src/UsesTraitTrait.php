<?php declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit;

use PHPFox\PHPUnit\Constraint\UsesTrait;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\LogicalNot;

trait UsesTraitTrait
{
    /**
     * Evaluates a \PHPUnit\Framework\Constraint matcher object.
     *
     * @param mixed $value
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    abstract public static function assertThat($value, Constraint $constraint, string $message = ''): void;

    /**
     * Asserts that *$subject* uses *$trait*.
     *
     * @param string $trait   name of the trait that is supposed to be included by *$subject*
     * @param mixed  $subject an object or a class name that is being examined
     * @param string $message custom message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public static function assertUsesTrait(string $trait, $subject, string $message = ''): void
    {
        static::assertThat($subject, static::usesTrait($trait), $message);
    }

    /**
     * Asserts that *$subject* does not use *$trait*.
     *
     * @param string $trait   name of the trait that is expected to be used by *$subject*
     * @param mixed  $subject an object or a class name that is being examined
     * @param string $message custom message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public static function assertNotUsesTrait(string $trait, $subject, string $message = ''): void
    {
        static::assertThat($subject, new LogicalNot(static::usesTrait($trait)), $message);
    }

    /**
     * Checks objects (an classes) that they use given *$trait*.
     *
     * @param string $trait name of the trait that is expected to be included
     */
    public static function usesTrait(string $trait): UsesTrait
    {
        return UsesTrait::create($trait);
    }
}

// vim: syntax=php sw=4 ts=4 et:
