<?php
class EnConvert{
   public static function ConvertToEnglishWord($number){
      if (!is_numeric($number)) return '';

      $fmt = new NumberFormatter('en', NumberFormatter::SPELLOUT);
      $result = $fmt->format($number);
      return ucwords($result);
   }
}
