<?php declare(strict_types=1);

/*
 * This file is part of php-tailors/phpunit-extensions.
 *
 * Copyright (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\PHPUnit\Properties;

/**
 * @internal This trait is not covered by the backward compatibility promise
 * @psalm-internal Tailors\PHPUnit
 */
trait ExpectedPropertiesDecoratorTrait
{
    abstract public function getExpectedProperties(): ExpectedPropertiesInterface;

    //
    // \IteratorAggregate
    //

    public function getIterator(): \Traversable
    {
        return $this->getExpectedProperties()->getIterator();
    }

    //
    // \ArrayAccess
    //

    public function offsetExists($offset): bool
    {
        return $this->getExpectedProperties()->offsetExists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->getExpectedProperties()->offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        $this->getExpectedProperties()->offsetSet($offset, $value);
    }

    public function offsetUnset($offset): void
    {
        $this->getExpectedProperties()->offsetUnset($offset);
    }

    //
    // \Countable
    //
    public function count(): int
    {
        return $this->getExpectedProperties()->count();
    }

    //
    // PropertiesInterface
    //

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return $this->getExpectedProperties()->getArrayCopy();
    }

    public function canUnwrapChild(PropertiesInterface $child): bool
    {
        return $this->getExpectedProperties()->canUnwrapChild($child);
    }

    //
    // ExpectedPropertiesInterface
    //

    public function getPropertySelector(): PropertySelectorInterface
    {
        return $this->getExpectedProperties()->getPropertySelector();
    }
}

// vim: syntax=php sw=4 ts=4 et:
