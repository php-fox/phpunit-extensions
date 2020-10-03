<?php declare(strict_types=1);

/*
 * This file is part of php-fox/phpunit-extensions.
 *
 * (c) Paweł Tomulik <ptomulik@meil.pw.edu.pl>
 *
 * Distributed under MIT license.
 */

namespace PHPFox\PHPUnit\Constraint;

use Exception;
use PHPFox\PHPUnit\Examples\Inheritance\ExampleClassNotUsingTrait;
use PHPFox\PHPUnit\Examples\Inheritance\ExampleClassUsingTrait;
use PHPFox\PHPUnit\Examples\Inheritance\ExampleTrait;
use PHPFox\PHPUnit\Examples\Inheritance\ExampleTraitUsingTrait;
use PHPFox\PHPUnit\InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @small
 * @covers \PHPFox\PHPUnit\Constraint\InheritanceConstraintTestTrait
 * @covers \PHPFox\PHPUnit\Constraint\UsesTrait
 * @covers \PHPFox\PHPUnit\Inheritance\AbstractConstraint
 * @covers \PHPFox\PHPUnit\Inheritance\ConstraintImplementationTrait
 *
 * @internal This class is not covered by the backward compatibility promise
 */
final class UsesTraitTest extends TestCase
{
    use InheritanceConstraintTestTrait;

    // required by InheritanceConstraintTestTrait
    public static function provFailureDescriptionOfCustomUnaryOperator(): iterable
    {
        return [
            'UsesTraitTest.php:'.__LINE__ => [
                'constraint' => UsesTrait::create(ExampleTrait::class),
                'subject'    => Exception::class,
                'expect'     => [
                    'exception' => ExpectationFailedException::class,
                    'message'   => '/Exception uses trait '.preg_quote(ExampleTrait::class, '/').'/',
                ],
            ],
        ];
    }

    // required by InheritanceConstraintTestTrait
    public static function provFailureDescriptionOfLogicalNotOperator(): iterable
    {
        return [
            'UsesTraitTest.php:'.__LINE__ => [
                'constraint' => UsesTrait::create(ExampleTrait::class),
                'subject'    => ExampleClassUsingTrait::class,
                'expect'     => [
                    'exception' => ExpectationFailedException::class,
                    'message'   => sprintf(
                        '/%s does not use trait %s/',
                        preg_quote(ExampleClassUsingTrait::class, '/'),
                        preg_quote(ExampleTrait::class, '/')
                    ),
                ],
            ],
        ];
    }

    public static function provUsesTrait(): array
    {
        return [
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => ExampleClassUsingTrait::class,
            ],
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => new ExampleClassUsingTrait(),
            ],
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => ExampleTraitUsingTrait::class,
            ],
        ];
    }

    public static function provNotUsesTrait(): array
    {
        $template = 'Failed asserting that %s uses trait %s.';

        return [
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => ExampleClassNotUsingTrait::class,
                'message' => sprintf($template, ExampleClassNotUsingTrait::class, ExampleTrait::class),
            ],
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => new ExampleClassNotUsingTrait(),
                'message' => sprintf($template, 'object '.ExampleClassNotUsingTrait::class, ExampleTrait::class),
            ],
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => 'lorem ipsum',
                'message' => sprintf($template, "'lorem ipsum'", ExampleTrait::class),
            ],
            'UsesTraitTest.php:'.__LINE__ => [
                'trait'   => ExampleTrait::class,
                'subject' => 123,
                'message' => sprintf($template, '123', ExampleTrait::class),
            ],
        ];
    }

    public static function provConstraintThrowsInvalidArgumentException(): array
    {
        $message = '/Argument #1 of \S+ must be a trait-string/';

        return [
            'UsesTraitTest.php:'.__LINE__ => [
                'argument' => 'non-trait string',
                'messsage' => $message,
            ],

            'UsesTraitTest.php:'.__LINE__ => [
                'argument' => Exception::class,
                'messsage' => $message,
            ],

            'UsesTraitTest.php:'.__LINE__ => [
                'argument' => Throwable::class,
                'messsage' => $message,
            ],
        ];
    }

    /**
     * @dataProvider provUsesTrait
     *
     * @param mixed $subject
     */
    public function testConstraintSucceeds(string $trait, $subject): void
    {
        $constraint = UsesTrait::create($trait);

        self::assertTrue($constraint->evaluate($subject, '', true));
    }

    /**
     * @dataProvider provNotUsesTrait
     *
     * @param mixed $subject
     */
    public function testConstraintFails(string $trait, $subject, string $message): void
    {
        $constraint = UsesTrait::create($trait);

        self::expectException(ExpectationFailedException::class);
        self::expectExceptionMessage($message);

        $constraint->evaluate($subject);
    }

    /**
     * @dataProvider provConstraintThrowsInvalidArgumentException
     */
    public function testConstraintThrowsInvalidArgumentException(string $argument, string $message): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessageMatches($message);

        UsesTrait::create($argument);
    }
}
