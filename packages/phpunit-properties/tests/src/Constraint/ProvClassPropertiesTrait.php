<?php declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Constraint;

/**
 * @internal
 */
trait ProvClassPropertiesTrait
{
    // @codeCoverageIgnoreStart

    public static function provClassPropertiesIdenticalTo(): array
    {
        $classes = [
            get_class(new class() {
                public static $emptyString = '';
                public static $null;
                public static $string123 = '123';
                public static $int321 = 321;
                public static $boolFalse = false;
            }),
        ];

        return [
            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => [
                    'emptyString' => '',
                    'null'        => null,
                    'string123'   => '123',
                    'int321'      => 321,
                    'boolFalse'   => false,
                ],
                'actual' => $classes[0],
                'string' => $classes[0],
            ],
        ];
    }

    public static function provClassPropertiesEqualButNotIdenticalTo(): array
    {
        $classes = [
            get_class(new class() {
                public static $emptyString = '';
                public static $null;
                public static $string123 = '123';
                public static $int321 = 321;
                public static $boolFalse = false;
            }),
        ];

        return [
            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => [
                    'emptyString' => null,
                    'null'        => '',
                    'string123'   => 123,
                    'int321'      => '321',
                    'boolFalse'   => 0,
                ],
                'actual' => $classes[0],
                'string' => $classes[0],
            ],
        ];
    }

    public static function provClassPropertiesNotEqualTo(): array
    {
        $classes = [
            get_class(new class() {
                public static $emptyString = '';
                public static $null;
                public static $string123 = '123';
                public static $int321 = 321;
                public static $boolFalse = false;
            }),
        ];

        return [
            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => [
                    'emptyString' => 'foo',
                    'null'        => 1,
                    'string123'   => '321',
                    'int321'      => 123,
                    'boolFalse'   => true,
                ],
                'actual' => $classes[0],
                'string' => $classes[0],
            ],
        ];
    }

    public static function provClassPropertiesNotEqualToNonClass(): array
    {
        return [
            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => ['foo' => 'FOO'],
                'actual' => 123,
                'string' => '123',
            ],

            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => ['foo' => 'FOO'],
                'actual' => 'arbitrary string',
                'string' => '\'arbitrary string\'',
            ],

            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => ['foo' => 'FOO'],
                'actual' => null,
                'string' => 'null',
            ],

            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => ['foo' => 'FOO'],
                'actual' => ['foo' => 'FOO'],
                'string' => 'array',
            ],

            'ProvClassPropertiesTrait.php:'.__LINE__ => [
                'expect' => ['foo' => 'FOO'],
                'actual' => new \stdClass(),
                'string' => 'object stdClass',
            ],
        ];
    }

    // @codeCoverageIgnoreEnd
}
