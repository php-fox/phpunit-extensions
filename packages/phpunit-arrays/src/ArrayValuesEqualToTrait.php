<?php declare(strict_types=1);

/*
 * This file is part of phptailors/phpunit-extensions.
 *
 * Copyright (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\PHPUnit;

use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\LogicalNot;
use Tailors\PHPUnit\Constraint\ArrayValuesEqualTo;

trait ArrayValuesEqualToTrait
{
    /**
     * Evaluates a \PHPUnit\Framework\Constraint\Constraint matcher object.
     *
     * @param mixed      $value
     * @param Constraint $constraint
     * @param string     $message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    abstract public static function assertThat($value, Constraint $constraint, string $message = ''): void;

    /**
     * Asserts that selected properties of *$actual* are identical to *$expected* ones.
     *
     * @param array  $expected
     *                         An array of expected values
     * @param mixed  $actual
     *                         A name of a class to be examined
     * @param string $message
     *                         Optional failure message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Tailors\PHPUnit\InvalidArgumentException
     */
    public static function assertArrayValuesEqualTo(
        array $expected,
        $actual,
        string $message = ''
    ): void {
        self::assertThat($actual, self::arrayValuesEqualTo($expected), $message);
    }

    /**
     * Asserts that selected properties of *$actual* are not identical to *$expected* ones.
     *
     * @param array  $expected
     *                         An array expected values
     * @param mixed  $actual
     *                         A name of a class to be examined
     * @param string $message
     *                         Optional failure message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \Tailors\PHPUnit\InvalidArgumentException
     */
    public static function assertNotArrayValuesEqualTo(
        array $expected,
        $actual,
        string $message = ''
    ): void {
        self::assertThat($actual, new LogicalNot(self::arrayValuesEqualTo($expected)), $message);
    }

    /**
     * Compares selected properties of *$actual* with *$expected* ones.
     *
     * @param array $expected
     *                        An array of expected values
     *
     * @throws \Tailors\PHPUnit\InvalidArgumentException
     */
    public static function arrayValuesEqualTo(array $expected): ArrayValuesEqualTo
    {
        return ArrayValuesEqualTo::create($expected);
    }
}

// vim: syntax=php sw=4 ts=4 et:
