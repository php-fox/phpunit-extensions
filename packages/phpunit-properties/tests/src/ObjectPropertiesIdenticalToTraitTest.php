<?php declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit;

use PHPFox\PHPUnit\Constraint\ProvObjectPropertiesTrait;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \PHPFox\PHPUnit\ObjectPropertiesIdenticalToTrait
 *
 * @internal
 */
final class ObjectPropertiesIdenticalToTraitTest extends TestCase
{
    use ObjectPropertiesIdenticalToTrait;
    use ProvObjectPropertiesTrait;

    /**
     * @dataProvider provObjectPropertiesIdenticalTo
     */
    public function testObjectPropertiesIdenticalTo(array $expect, object $object)
    {
        self::assertThat($object, self::objectPropertiesIdenticalTo($expect));
    }

    /**
     * @dataProvider provObjectPropertiesNotEqualTo
     * @dataProvider provObjectPropertiesEqualButNotIdenticalTo
     */
    public function testLogicalNotObjectPropertiesIdenticalTo(array $expect, object $object)
    {
        self::assertThat($object, self::logicalNot(self::objectPropertiesIdenticalTo($expect)));
    }

    /**
     * @dataProvider provObjectPropertiesIdenticalTo
     */
    public function testAssertObjectPropertiesIdenticalTo(array $expect, object $object)
    {
        self::assertObjectPropertiesIdenticalTo($expect, $object);
    }

    /**
     * @dataProvider provObjectPropertiesNotEqualTo
     * @dataProvider provObjectPropertiesEqualButNotIdenticalTo
     */
    public function testAssertObjectPropertiesIdenticalToFails(array $expect, object $object)
    {
        $regexp = '/^Lorem ipsum.\n'.
            'Failed asserting that object class\@.+ is an object '.
            'with properties identical to specified./';
        self::expectException(ExpectationFailedException::class);
        self::expectExceptionMessageMatches($regexp);

        self::assertObjectPropertiesIdenticalTo($expect, $object, 'Lorem ipsum.');
    }

    /**
     * @dataProvider provObjectPropertiesNotEqualTo
     */
    public function testAssertNotObjectPropertiesIdenticalTo(array $expect, object $object)
    {
        self::assertNotObjectPropertiesIdenticalTo($expect, $object);
    }

    /**
     * @dataProvider provObjectPropertiesIdenticalTo
     */
    public function testAssertNotObjectPropertiesIdenticalToFails(array $expect, object $object)
    {
        $regexp = '/^Lorem ipsum.\n'.
            'Failed asserting that object class@.+ fails to be an object '.
            'with properties identical to specified./';
        self::expectException(ExpectationFailedException::class);
        self::expectExceptionMessageMatches($regexp);

        self::assertNotObjectPropertiesIdenticalTo($expect, $object, 'Lorem ipsum.');
    }
}

// vim: syntax=php sw=4 ts=4 et:
