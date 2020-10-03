<?php

/*
 * This file is part of Korowai framework.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

declare(strict_types=1);

namespace PHPFox\PHPUnit\Constraint;

use PHPFox\PHPUnit\Properties\ComparatorInterface;
use PHPFox\PHPUnit\Properties\IdentityComparator;
use PHPFox\PHPUnit\Properties\ObjectPropertySelector;
use PHPFox\PHPUnit\Properties\PropertySelectorInterface;

/**
 * Constraint that accepts objects having properties identical to specified ones.
 *
 * Compares only properties present in the array of expectations. A property is
 * defined as either an attribute value or a value returned by object's method
 * callable without arguments. The ``===`` operator (identity) is used for
 * comparison.
 *
 *
 * Any key in *$expected* array ending with ``"()"`` is considered to be a
 * method that returns property value.
 *
 *      // ...
 *      $matcher = ObjectPropertiesIdenticalTo::fromArray([
 *          'getName()' => 'John', 'age' => 21
 *      ]);
 *
 *      $this->assertThat(new class {
 *          public static $age = 21;
 *          public static getName(): string {
 *              return 'John';
 *          }
 *      }, $matcher);
 *
 * @author Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * @extends AbstractPropertiesComparator<ObjectPropertiesIdenticalTo>
 */
final class ObjectPropertiesIdenticalTo extends AbstractPropertiesComparator
{
    /**
     * Returns short description of subject type supported by this constraint.
     */
    public function subject(): string
    {
        return 'an object';
    }

    /**
     * Creates instance of ObjectPropertySelector.
     */
    protected static function makePropertySelector(): PropertySelectorInterface
    {
        return new ObjectPropertySelector();
    }

    /**
     * Creates instance of IdentityComparator.
     */
    protected static function makeComparator(): ComparatorInterface
    {
        return new IdentityComparator();
    }
}

// vim: syntax=php sw=4 ts=4 et:
