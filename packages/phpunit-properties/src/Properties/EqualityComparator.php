<?php declare(strict_types=1);

/*
 * This file is part of php-tailors/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPTailors\PHPUnit\Properties;

/**
 * @internal This class is not covered by the backward compatibility promise
 * @psalm-internal PHPTailors\PHPUnit
 */
final class EqualityComparator implements ComparatorInterface
{
    /**
     * @param mixed $left
     * @param mixed $right
     */
    public function compare($left, $right): bool
    {
        return $left == $right;
    }

    /**
     * Returns an adjective that identifies this comparison operator.
     *
     * @return string "equal to"
     */
    public function adjective(): string
    {
        return 'equal to';
    }
}

// vim: syntax=php sw=4 ts=4 et:
