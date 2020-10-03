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
final class ExampleBarClass extends ExampleFooClass implements ExampleBarInterface
{
    use ExampleQuxTrait;

    /**
     * @var mixed
     */
    private $bar;

    /**
     * Initialized ExampleBarClass instance.
     *
     * @param mixed $options initial values for attributes
     */
    public function __construct(array $options = [])
    {
        $this->setBar($options['bar'] ?? null);
        $this->setQux($options['qux'] ?? null);
        parent::__construct($options);
    }

    /**
     * Sets value of the *$bar* attribute.
     *
     * @param mixed $bar
     *                   New attribute value
     *
     * @return ExampleBarInterface
     *                             Returns *$this*
     */
    public function setBar($bar): ExampleBarInterface
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBar()
    {
        return $this->bar;
    }
}

// vim: syntax=php sw=4 ts=4 et:
