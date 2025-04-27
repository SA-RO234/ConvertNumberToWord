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

    public static function toKhmerword($number)
    {
        if (!is_numeric($number)) return '';
        if ($number == 0) return self::$khNumbers[0];
        if ($number == 100) return 'មួយរយ';

        $khTens = [
            1 => 'ដប់',
            2 => 'ម្ភៃ',
            3 => 'សាមសិប',
            4 => 'សែសិប',
            5 => 'ហាសិប',
            6 => 'ហុកសិប',
            7 => 'ចិតសិប',
            8 => 'ប៉ែកសិប',
            9 => 'កៅសិប',
        ];

        $parts = [];

        // Handle thousands
        if ($number >= 1000) {
            $thousands = intval($number / 1000);
            $parts[] = self::$khNumbers[$thousands] . 'ពាន់';
            $number = $number % 1000;
        }

        //  Handle hundreds 
        if ($number >= 100) {
            $hundreds = intval($number / 100);
            $parts[] = self::$khNumbers[$hundreds] . 'រយ';
            $number = $number % 100;
        }

        // Handle tens 10 -> 99 
        if ($number >= 10 && $number < 100) {
            $tens = intval($number / 10);
            $ones = $number % 10;
            $tensword = $khTens[$tens];
            if ($ones > 0) {
                $tensword .= self::$khNumbers[$ones];
            }

            $parts[] = $tensword;
            $number = 0;
        }

        // Handle 1 - 9
        if ($number > 0 && $number < 10) {
            $parts[] = self::$khNumbers[$number];
        }

        return implode('', $parts);
    }
}
