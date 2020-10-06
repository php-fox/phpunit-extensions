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
 * @internal This interface is not covered by the backward compatibility promise
 * @psalm-internal Tailors\PHPUnit
 */
interface ExpectedPropertiesInterface extends PropertiesInterface
{
    public function getPropertySelector(): PropertySelectorInterface;
}

// vim: syntax=php sw=4 ts=4 et: