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
