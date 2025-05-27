<?php
class khConvert
{
    private static $khNumbers = [
        0 => 'សូន្យ',
        1 => 'មួយ',
        2 => 'ពីរ',
        3 => 'បី',
        4 => 'បួន',
        5 => 'ប្រាំ',
        6 => 'ប្រាំមួយ',
        7 => 'ប្រាំពីរ',
        8 => 'ប្រាំបី',
        9 => 'ប្រាំបួន'
    ];

    private static $khTens = [
        1 => 'ដប់',
        2 => 'ម្ភៃ',
        3 => 'សាមសិប',
        4 => 'សែសិប',
        5 => 'ហាសិប',
        6 => 'ហុកសិប',
        7 => 'ចិតសិប',
        8 => 'ប៉ែកសិប',
        9 => 'កៅសិប'
    ];

    public static function toKhmerword($number)
    {
        if (!is_numeric($number) || $number < 1 || $number > 99999999) {
            return 'លេខមិនត្រឹមត្រូវ!';
        }

        $parts = [];

       
        if ($number >= 1000000) {
            $millions = intval($number / 1000000);
            $parts[] = self::convertBelowThousand($millions) . 'លាន';
            $number %= 1000000;
        }

        if ($number >= 100000) {
            $hundredThousands = intval($number / 100000);
            $parts[] = self::$khNumbers[$hundredThousands] . 'សែន';
            $number %= 100000;
        }

        
        if ($number >= 10000) {
            $tenThousands = intval($number / 10000);
            $parts[] = self::$khNumbers[$tenThousands] . 'មុឺន';
            $number %= 10000;
        }

     
        if ($number >= 1000) {
            $thousands = intval($number / 1000);
            $parts[] = self::$khNumbers[$thousands] . 'ពាន់';
            $number %= 1000;
        }
         
        if ($number > 0) {
            $parts[] = self::convertBelowThousand($number);
        }

        return implode('', $parts);
    }

    private static function convertBelowThousand($number)
    {
        $parts = [];

        
        if ($number >= 100) {
            $hundreds = intval($number / 100);
            $parts[] = self::$khNumbers[$hundreds] . 'រយ';
            $number %= 100;
        }

        
        if ($number >= 10) {
            $tens = intval($number / 10);
            $ones = $number % 10;
            $tensWord = self::$khTens[$tens];
            if ($ones > 0) {
                $tensWord .= self::$khNumbers[$ones];
            }
            $parts[] = $tensWord;
        } elseif ($number > 0) {
            $parts[] = self::$khNumbers[$number];
        }

        return implode('', $parts);
    }
}
