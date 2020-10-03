<?php

/*
 * This file is part of Korowai framework.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

declare(strict_types=1);

namespace PHPFox\PHPUnit\Properties;

use PHPFox\PHPUnit\Properties\ActualProperties;
use PHPFox\PHPUnit\Properties\ExpectedProperties;
use PHPFox\PHPUnit\Properties\ExpectedPropertiesInterface;
use PHPFox\PHPUnit\Properties\PropertiesInterface;
use PHPFox\PHPUnit\Properties\PropertySelectorInterface;

/**
 * @author Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 */
trait ExpectedPropertiesTestTrait
{
    abstract public function createExpectedProperties(
        PropertySelectorInterface $selector,
        ...$args
    ): ExpectedPropertiesInterface;

    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
     * @psalm-template ExpectedType
     * @psalm-param ExpectedType $expected
     * @psalm-assert =ExpectedType $actual
     *
     * @param mixed $expected
     * @param mixed $actual
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    abstract public static function assertSame($expected, $actual, string $message = ''): void;

    //
    //
    // TESTS
    //
    //

    //
    // canUnwrapChild()
    //

    // @codeCoverageIgnoreStart
    public function provExpectedPropertiesCanUnwrapChild(): array
    {
        $selector = $this->createMock(PropertySelectorInterface::class);

        return [
            // #0
            [
                'parent' => $this->createExpectedProperties($selector),
                'child' => new ActualProperties(),
                'expect' => false,
            ],

            // #1
            [
                'parent' => $this->createExpectedProperties($selector),
                'child' => new ExpectedProperties($selector),
                'expect' => true,
            ],
        ];
    }

    // @codeCoverageIgnoreEnd

    /**
     * @dataProvider provExpectedPropertiesCanUnwrapChild
     */
    public function testExpectedPropertiesCanUnwrapChild(
        PropertiesInterface $parent,
        PropertiesInterface $child,
        bool $expect
    ): void {
        $this->assertSame($expect, $parent->canUnwrapChild($child));
    }
}
// vim: syntax=php sw=4 ts=4 et:
