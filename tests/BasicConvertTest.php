<?php declare(strict_types=1);

namespace Convert\Converter\Tests;

use PHPUnit\Framework\TestCase;
use Convert\Converter\ConvertCode;

/**
 * Convert code unit test
 * cmd: ./vendor/bin/phpunit --testdox tests
 */
final class BasicConvertTest extends TestCase
{
  public function testCanCreatClass(): void
  {
    $this->assertInstanceOf(
      ConvertCode::class,
      new ConvertCode()
    );
  }
     
  public function testConvertNumberToCode(): void
  {
    $this->assertEquals(
      "ZYW",
      ConvertCode::ConvertToCode(238324)
    );      
  }

  public function testConvertCodeToNumber(): void
  {
    $Number = ConvertCode::ConvertFromCode("YZ");

    $this->assertIsInt(
      $Number
    );

    $this->assertEquals(
      3843,
      $Number
    );
  }

  public function testConvertBack(): void
  {
    // TODO: error on 42288 upper
    for ($i=0; $i < 42284; $i++) { 
      $code = ConvertCode::ConvertToCode($i);
      $number = ConvertCode::ConvertFromCode($code);
      $this->assertEquals($i, $number);
    }
  }
}
?>
