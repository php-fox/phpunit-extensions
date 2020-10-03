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

/**
 * @author Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 */
interface ExpectedPropertiesInterface extends PropertiesInterface
{
    public function getPropertySelector(): PropertySelectorInterface;
}

// vim: syntax=php sw=4 ts=4 et:
