<?php

namespace Convert\Converter;

/**
 * Simple script to convert from number to code/id/string 
 * 
 * @version 1.0
 * @author Angger Pradana
 * @link https://github.com/SonyPradana/Ccode
 */
class ConvertCode
{
    /** @var int Number for this section */
    private $_number = 0;

    /** @var array Array of code */
    public $codes = [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "a",
        "b",
        "c",
        "d",
        "e", 
        "f", 
        "g", 
        "h", 
        "i", 
        "j", 
        "k", 
        "l", 
        "m", 
        "n", 
        "o", 
        "p", 
        "q", 
        "r", 
        "s", 
        "t", 
        "u", 
        "v", 
        "w", 
        "x", 
        "y", 
        "z",
        "A", 
        "B", 
        "C", 
        "D", 
        "E", 
        "F", 
        "G", 
        "H", 
        "I", 
        "J", 
        "K", 
        "L", 
        "M", 
        "N", 
        "O", 
        "P", 
        "Q", 
        "R", 
        "S", 
        "T", 
        "U", 
        "V", 
        "W", 
        "X", 
        "Y", 
        "Z"
    ];

    /** Get code from this section
     * @return string Code/id/string     * 
     */
    public function getCode(): string
    {
        $res = new ConvertCode();
        return $res->convertNumberToCode($this->_number);
    }

    /** Get number from this section
     * @return int Number
     */
    public function getNumber(): int
    {
        return $this->_number;;
    }

    /** Set code/id to this section
     * @param string $code Code/id/string to convert
     */
    public function setCode(string $code)
    {
        $res = new ConvertCode();
        $this->_number = $res->convertCodeToNumber($code);
        return $this;
    }

    /** Set number to this section
     * @param int $number Number to convert
     */
    public function setNumber(int $number)
    {
        $this->_number = $number;
        return $this;
    }

    /** Add a certain number to this section 
     * @param $number How many number (+) operator
     * @return bool True if success execution
     */
    public function plusOperator(int $number = 1): bool
    {
        if (is_numeric($number)) {
            $this->_number + $number;
            return true;
        }
        return false;
    }

    /** Reduce certain numbers to this section 
     * @param $number How many number (+) operator
     * @return bool True if success execution*/
    public function minusOperator(int $number = 1): bool
    {
        if (is_numeric($number)) {
            $this->_number - $number;
            return true;
        }
        return false;
    }

    // private methode

    /** Convert from code to number
     * @param string $code Code/id to convert
     * @return int Result convert as number
     */
    private function convertCodeToNumber(string $code): int
    {
        $arr_code = preg_split('//u', $code, -1, PREG_SPLIT_NO_EMPTY);
        $digit = (int) count( $arr_code );
        // One digit, return as array index from codes
        if ($digit == 1) {
            return array_search(max($arr_code), $this->codes);
        }
        $sum = (int) -1;
        $j = $digit -1;
        for ($i = 0; $i < $digit; $i++) { 
            $pos = array_search($arr_code[$i], $this->codes);
            // var_dump( $digit );
            $pw  = 62 ** $j;
            $row = ($pw * $pos) - ($pw * $i) + 1;
            $sum += $row; 
            $j--;
        }

        $digit += 1;
        return $sum + (62 * ($digit - 1)) - 62;
    }

    /** Convert from number to code
     * @param int $number Number to convert
     * @return string Result convert as code/id
     */
    private function convertNumberToCode(int $number): string
    {
        // Negative number not allow
        if ($number < 0) return false;
        $code = []; 

        if ($number < 62) {
            $code[] = $this->codes[$number];
            return implode("", $code);
        }

        $num  = $number - 62; 

        $digit = 0;
        $max = 0;
        while ($max <= $number) {
            $max = pow(62, $digit);
            $digit++;
        }
        for ($i = $digit; $i > 1; $i--) {
            $pw = pow(62, $i-1);
            $idx = (float) ($num / $pw);
            $idx = floor( $idx );
            $code[] = $this->codes[$idx] ;
            $num = $num % $pw;
        }

        $code[] = $this->codes[$num];
        // Remove 0 (zero) before "Z"
        // if 0 number before Z exis couse false indexing
        unset( $code[0] );
        if ($code[1] == 0 
        && $code[2] == "Z"
        && isset( $code[3])) {
            unset( $code[1] );
        }
        $res = implode("", $code);
        $res = $res == "" ? 0 : $res;
        return (string) $res;  
    }

    // static method

    /** Convert from code to number
     * @param string $code Code/id to convert
     * @return int Result convert as number
     */
    public static function ConvertFromCode(string $code): int
    {
        $res = new ConvertCode();
        return $res->convertCodeToNumber($code);
    }

    /** Convert from number to code
     * @param int $number Number to convert
     * @return string Result convert as code/id
     */
    public static function ConvertToCode(int $number): string
    {
        $res = new ConvertCode();
        return $res->convertNumberToCode($number);
    }

    /** Random code based on the specified numbers
     * @param int $digit Makimum digit allowed
     */
    public static function RandomCode(int $digit = 4): string
    {
        $digit = $digit < 0 ? 1 : $digit;
        $ccode = new ConvertCode();
        $code = [];
        for ($i=0; $i < $digit; $i++) { 
            $code[] = $ccode->codes[rand(0, 61)];
        }
        return  implode("", $code);;
    }
}
