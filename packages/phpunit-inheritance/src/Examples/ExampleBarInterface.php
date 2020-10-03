<?php

/*
 * This file is part of Korowai framework.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

declare(strict_types=1);

namespace PHPFox\PHPUnit\Examples;

/**
 * Example interface for testing purposes.
 *
 * @author Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 */
interface ExampleBarInterface
{
    /**
     * Returns *$bar* attribute.
     *
     * @return mixed
     */
    public function getBar();
}

// vim: syntax=php sw=4 ts=4 et:
