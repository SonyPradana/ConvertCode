# ConvertCode
Simple script to creat uniq id from number, support until up to **11.694.146.092.834.141** digit number. With suport convert back to id (string).

We recommended if you need shorter id from long number ex: timestamp, id with large integer, or name think.

Basic convert is creat id from array of string, then build from array index one by one.
You can costumize by edit entry of array.

By default array using [0-9][a-z][A-Z] its mean case sensitive. different between AA and aA

### Sample
```
-------------------------------------------------
|       index   |       code    |       number  |
----------------+---------------+----------------
|       94      |       0w      |       94      |
|       95      |       0x      |       95      |
|       96      |       0y      |       96      |
|       ...     |       ...     |       ...     |
|       3842    |       YY      |       3842    |
|       3843    |       YZ      |       3843    |
|       3844    |       Z0      |       3844    |
|       ...     |       ...     |       ...     |
|       238323  |       ZYV     |       238323  |
|       238324  |       ZYW     |       238324  |
|       238325  |       ZYX     |       238325  |
-------------------------------------------------
```
### CLI Support
run test from 1 to 100
```bash
php CLI test 1 100
```
will output
```bash
-------------------------------------------------
|       index   |       code    |       number  |
----------------+---------------+----------------
|       1       |       1       |       1       |
|       2       |       2       |       2       |
|       3       |       3       |       3       |
|       4       |       4       |       4       |
|       5       |       5       |       5       |
... 
|       95      |       0x      |       95      |
|       96      |       0y      |       96      |
|       97      |       0z      |       97      |
|       98      |       0A      |       98      |
|       99      |       0B      |       99      |
|       100     |       0C      |       100     |
-------------------------------------------------
```
other command
```bash
php CLI 
php CLI to-code [number]
php CLI from-code [string_code]
```

## Installation

You can directly import this class from your project.
```php
include 'path_to_ConvertCode_file' . '/ConvertCode.php';
```
If using [Composer](https://getcomposer.org/)
```bash
composer require sonypradana/convertcode;
```

## Usage
You can make id using declare class or directly.

### Using class:

Craet class
```php
use Convert\Converter\ConvertCode;

$ccode = new ConvertCode();
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
$ccode->minusOperator(2);    // minus 2
echo $ccode->getNumber();   // will out put -> 999999
echo $ccode->getCode();     // will out put -> ac81
```

### Directly
You also can call function directly

Convert from **id/code/string** to **number**
```php
use ConvertCode\Converter\ConvertCode;

$id_number = ConvertCode::ConvertFromCode( "0B" );
echo $id_number; // will out put 99
```
Convert from **number** to **id/code/string**
```php
use ConvertCode\Converter\ConvertCode;

$id_code = ConvertCode::ConvertFromNumber( 99 );
echo $id_code; // will out put "0B"
```

If you want to get random **id/code/string**, you can use
```php
use ConvertCode\Converter\ConvertCode;

$id_code = ConvertCode::RandomCode( 4 ); // how many digit code you want
echo $id_code; // random code 
```
