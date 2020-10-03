<?php

declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Preg;

interface CapturesFilterInterface
{
    /**
     * Returns PCRE flags set to this object.
     */
    public function getFlags(): int;

    /**
     * Filter-out all elements of $array with $this->acceptable().
     *
     * @return array the filtered array
     */
    public function filter(array $array): array;

    /**
     * Returns true if $value is a capture group returned by preg_match().
     *
     * The method shall return true only in the following situations:
     *
     *  - $value is a string or PREG_UNMATCHED_AS_NULL is set and $value is null, or
     *  - PREG_OFFSET_CAPTURE is set and
     *
     *      - $value is two-element array, and
     *      - $value[0] is a string or PREG_UNMATCHED_AS_NULL is set and $value is null, and
     *      - $value[1] is an integer,
     *
     * @param mixed $value
     * @psalm-assert-if-true string|null|array{0:string|null,1:int} $value
     */
    public function acceptable($value): bool;
}

// vim: syntax=php sw=4 ts=4 et:
