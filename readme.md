# CCode
Simple script to creat uniq id from number, support until up to **11.694.146.092.834.141** digit number. With suport convert back to id (string).

We recommended if you need shorter id from long number ex: timestamp, id with large integer, or name think.

Basic convert is creat id from array of string, then build from array index one by one.
You can costumize by edit entry of array.

By default array using [0-9][a-z][A-Z] its mean case sensitive. different between AA and aA

### Sample
```
    94 = 0w
    95 = 0x
    96 = 0y
    ...
    3842 = YY
    3843 = YZ
    3844 = Z0
    ...
    238323 = ZYV
    238324 = ZYW
    238325 = ZYX
```

## Installation

You can directly import this class from your project.
```php
include 'path_to_CCode_file' . '/CCode.php';
```
If using [Composer](https://getcomposer.org/)
```bash
composer require sonypradana/ccode;
```

## Usage
You can make id using declare class or directly.

### Using class:

Craet class
```php
use CCode\Converter\CCode;

$ccode = new CCode();
```
Creat id (string) from number
```php
$ccode->setNumber( 999999 );  // creat id by 99
echo $ccode->getCode();       // will out put -> 4c81
```
Creat id (string) from id/code/string
```php
$ccode->setCode( '4c82' );  // creat id by code "4c82"
echo $ccode->getNumber();   // will out put -> 1000000
```
You can also using operator
```php
// plus (+) operator
$ccode->plusOperator(1);    // plus 1
echo $ccode->getNumber();   // will out put -> 1000001
echo $ccode->getCode();     // will out put -> ac83

// minus (-) operator
$ccode->minusOperator(1);    // minus 2
echo $ccode->getNumber();   // will out put -> 999999
echo $ccode->getCode();     // will out put -> ac81
```

### Directly
You also can call function directly

Convert from **id/code/string** to **number**
```php
use CCode\Converter\CCode;

$id_number = CCode::ConvertFromCode( "0B" );
echo $id_number; // will out put 99
```
Convert from **number** to **id/code/string**
```php
use CCode\Converter\CCode;

$id_code = CCode::ConvertFromNumber( 99 );
echo $id_code; // will out put "0B"
```

If you want to get random **id/code/string**, you can use
```php
use CCode\Converter\CCode;

$id_code = CCode::RandomCode( 4 ); // how many digit code you want
echo $id_code; // random code 
```
