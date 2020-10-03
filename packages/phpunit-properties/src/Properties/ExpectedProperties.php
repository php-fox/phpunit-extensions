<?php declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Properties;

/**
 * @internal This class is not covered by the backward compatibility promise
 */
final class ExpectedProperties extends \ArrayObject implements ExpectedPropertiesInterface
{
    /**
     * @var PropertySelectorInterface
     * @psalm-readonly
     */
    private $propertySelector;

    /**
     * @param null|array|object $input
     */
    public function __construct(PropertySelectorInterface $propertySelector, $input = [])
    {
        $this->propertySelector = $propertySelector;
        parent::__construct($input);
    }

    /**
     * @psalm-mutation-free
     */
    public function getPropertySelector(): PropertySelectorInterface
    {
        return $this->propertySelector;
    }

    /**
     * @psalm-mutation-free
     */
    public function canUnwrapChild(PropertiesInterface $child): bool
    {
        return $child instanceof ExpectedPropertiesInterface;
    }
}

// vim: syntax=php sw=4 ts=4 et:
