<?php declare(strict_types=1);

final class classPropertiesIdenticalToTest extends \PHPUnit\Framework\TestCase
{
    use \PHPFox\PHPUnit\ClassPropertiesIdenticalToTrait;

    public static $attribute = 123;

    public static function getValue()
    {
        return 321;
    }

    public function testSuccess()
    {
        // assert that:
        $this->assertThat(self::class, $this->classPropertiesIdenticalTo([
            'attribute'  => 123,   // - self::$attribute is 123 (ok)
            'getValue()' => 321,    // - self::getValue() is 321 (ok)
        ]));
    }

    public function testFailure()
    {
        // assert that:
        $this->assertThat(self::class, $this->classPropertiesIdenticalTo([
            'attribute'  => '123',   // - self::$attribute is 123, not '123' (fail)
            'getValue()' => null,     // - self::getValue() is 321, not null (fail)
        ]));
    }
}
