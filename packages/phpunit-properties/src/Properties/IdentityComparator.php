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
final class IdentityComparator implements ComparatorInterface
{
    /**
     * @param mixed $left
     * @param mixed $right
     */
    public function compare($left, $right): bool
    {
        return $left === $right;
    }

    /**
     * Returns an adjective that identifies this comparison operator.
     *
     * @return string "identical to"
     */
    public function adjective(): string
    {
        return 'identical to';
    }
}

// vim: syntax=php sw=4 ts=4 et:
