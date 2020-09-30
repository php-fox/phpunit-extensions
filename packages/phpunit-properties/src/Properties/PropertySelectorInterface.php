<?php

declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Properties;

/**
 * @author Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 */
interface PropertySelectorInterface
{
    /**
     * @param mixed $subject
     */
    public function canSelectFrom($subject): bool;

    /**
     * @param mixed $subject
     * @param mixed $key
     * @param mixed $retval
     *
     * @psalm-param array-key $key
     */
    public function selectProperty($subject, $key, &$retval = null): bool;
}

// vim: syntax=php sw=4 ts=4 et: